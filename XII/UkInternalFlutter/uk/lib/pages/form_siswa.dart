import 'dart:typed_data';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:image_picker/image_picker.dart';
import '../db/cloudDinary/cloudSer.dart';
import '../db/firebase/dtSiswa.dart';
import '../db/firebase/fbSer.dart';

class FormSiswa extends StatefulWidget {
  final dtSiswa? student;

  const FormSiswa({super.key, this.student});

  @override
  State<FormSiswa> createState() => _FormSiswaState();
}

class _FormSiswaState extends State<FormSiswa> {
  final _formKey = GlobalKey<FormState>();
  final ImagePicker _picker = ImagePicker();

  late final TextEditingController _nisController;
  late final TextEditingController _nameController;
  late final TextEditingController _phoneController;
  late final TextEditingController _addressController;

  late String _selectedClass;
  late String _selectedGender;
  String? _currentPhotoUrl;
  XFile? _pickedFile;
  Uint8List? _pickedBytes;
  bool _isLoading = false;

  List<String> _classList = ['XI PPLG 1', 'XI PPLG 2', 'XII PPLG'];

  @override
  void initState() {
    super.initState();
    _nisController = TextEditingController(text: widget.student?.nis ?? '');
    _nameController = TextEditingController(text: widget.student?.name ?? '');
    _phoneController = TextEditingController(text: widget.student?.phone ?? '');
    _addressController = TextEditingController(text: widget.student?.address ?? '');
    _currentPhotoUrl = widget.student?.photoUrl;
    final initialClass = widget.student?.className.trim() ?? '';
    if (initialClass.isNotEmpty && !_classList.contains(initialClass)) {
      _classList.add(initialClass);
      _classList.sort();
    }
    _selectedClass = initialClass.isNotEmpty ? initialClass : _classList.first;
    _selectedGender = widget.student?.gender ?? 'Laki-laki';

    _loadClassesFromDb();
  }

  Future<void> _loadClassesFromDb() async {
    try {
      final classes = await FirebaseService.getAvailableClasses();
      if (classes.isNotEmpty && mounted) {
        setState(() {
          final set = <String>{...classes};
          if (widget.student?.className.trim().isNotEmpty ?? false) {
            set.add(widget.student!.className.trim());
          }
          _classList = set.toList()..sort();
          if (!_classList.contains(_selectedClass)) {
            _selectedClass = _classList.first;
          }
        });
      }
    } catch (_) {}
  }

  @override
  void dispose() {
    _nisController.dispose();
    _nameController.dispose();
    _phoneController.dispose();
    _addressController.dispose();
    super.dispose();
  }

  Future<void> _pickImage(ImageSource source) async {
    try {
      final picked = await _picker.pickImage(
        source: source,
        maxWidth: 1000,
        maxHeight: 1000,
        imageQuality: 85,
      );
      if (picked != null) {
        final bytes = await picked.readAsBytes();
        setState(() {
          _pickedFile = picked;
          _pickedBytes = bytes;
        });
      }
    } catch (_) {
      if (mounted) {
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(
            content: Text('Gagal mengakses kamera/galeri'),
            backgroundColor: Colors.red,
          ),
        );
      }
    }
  }

  void _showImagePickerSheet() {
    showModalBottomSheet(
      context: context,
      shape: const RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(top: Radius.circular(16)),
      ),
      builder: (ctx) => SafeArea(
        child: Wrap(
          children: [
            ListTile(
              leading: const Icon(Icons.photo_library),
              title: const Text('Pilih dari Galeri'),
              onTap: () {
                Navigator.pop(ctx);
                _pickImage(ImageSource.gallery);
              },
            ),
            ListTile(
              leading: const Icon(Icons.camera_alt),
              title: const Text('Ambil Foto Kamera'),
              onTap: () {
                Navigator.pop(ctx);
                _pickImage(ImageSource.camera);
              },
            ),
          ],
        ),
      ),
    );
  }

  Future<void> _save() async {
    if (!_formKey.currentState!.validate()) return;

    setState(() {
      _isLoading = true;
    });

    try {
      String? finalPhotoUrl = _currentPhotoUrl;

      if (_pickedFile != null) {
        final uploaded = await ser.uploadImage(_pickedFile!);
        if (uploaded != null) {
          finalPhotoUrl = uploaded;
        } else {
          if (mounted) {
            ScaffoldMessenger.of(context).showSnackBar(
              SnackBar(
                content: Text('Gagal upload: ${ser.lastError ?? "Unknown error"}'),
                backgroundColor: Colors.red,
              ),
            );
          }
          return;
        }
      }

      final studentData = dtSiswa(
        id: widget.student?.id,
        nis: _nisController.text.trim(),
        name: _nameController.text.trim(),
        className: _selectedClass,
        gender: _selectedGender,
        phone: _phoneController.text.trim(),
        address: _addressController.text.trim(),
        photoUrl: finalPhotoUrl,
        createdAt: widget.student?.createdAt ?? DateTime.now().toIso8601String(),
      );

      if (widget.student != null) {
        await FirebaseService.updateStudent(studentData);
      } else {
        await FirebaseService.addStudent(studentData);
      }

      if (mounted) {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
            content: Text(
              widget.student != null
                  ? 'Data siswa berhasil diperbarui'
                  : 'Data siswa berhasil ditambahkan',
            ),
            backgroundColor: Colors.green,
          ),
        );
        Navigator.pop(context);
      }
    } catch (e) {
      if (mounted) {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
            content: Text('Gagal menyimpan data: $e'),
            backgroundColor: Colors.red,
          ),
        );
      }
    } finally {
      if (mounted) {
        setState(() {
          _isLoading = false;
        });
      }
    }
  }

  @override
  Widget build(BuildContext context) {
    final isEdit = widget.student != null;

    return Scaffold(
      backgroundColor: const Color(0xFFF8FAFC),
      appBar: AppBar(
        backgroundColor: Colors.white,
        elevation: 0,
        iconTheme: const IconThemeData(color: Color(0xFF1E293B)),
        title: Text(
          isEdit ? 'Edit Data Siswa' : 'Tambah Data Siswa',
          style: const TextStyle(
            color: Color(0xFF1E293B),
            fontWeight: FontWeight.bold,
            fontSize: 18,
          ),
        ),
      ),
      body: _isLoading
          ? const Center(child: CircularProgressIndicator())
          : SingleChildScrollView(
              padding: const EdgeInsets.all(20),
              child: Form(
                key: _formKey,
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Center(
                      child: Stack(
                        children: [
                          CircleAvatar(
                            radius: 50,
                            backgroundColor: const Color(0xFFE2E8F0),
                            backgroundImage: _pickedBytes != null
                                ? MemoryImage(_pickedBytes!)
                                : (_currentPhotoUrl != null && _currentPhotoUrl!.isNotEmpty
                                    ? NetworkImage(_currentPhotoUrl!) as ImageProvider
                                    : null),
                            child: _pickedBytes == null &&
                                    (_currentPhotoUrl == null || _currentPhotoUrl!.isEmpty)
                                ? const Icon(Icons.person, size: 50, color: Color(0xFF64748B))
                                : null,
                          ),
                          Positioned(
                            bottom: 0,
                            right: 0,
                            child: InkWell(
                              onTap: _showImagePickerSheet,
                              child: Container(
                                padding: const EdgeInsets.all(8),
                                decoration: const BoxDecoration(
                                  color: Color(0xFF2563EB),
                                  shape: BoxShape.circle,
                                ),
                                child: const Icon(
                                  Icons.camera_alt,
                                  color: Colors.white,
                                  size: 18,
                                ),
                              ),
                            ),
                          ),
                        ],
                      ),
                    ),
                    const SizedBox(height: 24),
                    TextFormField(
                      controller: _nisController,
                      keyboardType: TextInputType.number,
                      inputFormatters: [FilteringTextInputFormatter.digitsOnly],
                      decoration: InputDecoration(
                        labelText: 'NIS',
                        hintText: 'Contoh: 12345',
                        border: OutlineInputBorder(borderRadius: BorderRadius.circular(10)),
                        filled: true,
                        fillColor: Colors.white,
                      ),
                      validator: (val) {
                        if (val == null || val.trim().isEmpty) {
                          return 'NIS wajib diisi';
                        }
                        return null;
                      },
                    ),
                    const SizedBox(height: 16),
                    TextFormField(
                      controller: _nameController,
                      inputFormatters: [
                        FilteringTextInputFormatter.allow(RegExp(r'[a-zA-Z\s]')),
                      ],
                      decoration: InputDecoration(
                        labelText: 'Nama Lengkap',
                        hintText: 'Masukkan nama siswa',
                        border: OutlineInputBorder(borderRadius: BorderRadius.circular(10)),
                        filled: true,
                        fillColor: Colors.white,
                      ),
                      validator: (val) {
                        if (val == null || val.trim().isEmpty) {
                          return 'Nama wajib diisi';
                        }
                        if (RegExp(r'[0-9]').hasMatch(val)) {
                          return 'Nama tidak boleh mengandung angka';
                        }
                        return null;
                      },
                    ),
                    const SizedBox(height: 16),
                    DropdownButtonFormField<String>(
                      value: _selectedClass,
                      items: _classList.map((c) {
                        return DropdownMenuItem(value: c, child: Text(c));
                      }).toList(),
                      onChanged: (val) {
                        if (val != null) {
                          setState(() {
                            _selectedClass = val;
                          });
                        }
                      },
                      decoration: InputDecoration(
                        labelText: 'Kelas',
                        border: OutlineInputBorder(borderRadius: BorderRadius.circular(10)),
                        filled: true,
                        fillColor: Colors.white,
                      ),
                    ),
                    const SizedBox(height: 16),
                    const Text(
                      'Jenis Kelamin',
                      style: TextStyle(
                        fontSize: 14,
                        fontWeight: FontWeight.w600,
                        color: Color(0xFF1E293B),
                      ),
                    ),
                    const SizedBox(height: 8),
                    Row(
                      children: [
                        Expanded(
                          child: Container(
                            decoration: BoxDecoration(
                              color: Colors.white,
                              borderRadius: BorderRadius.circular(10),
                              border: Border.all(
                                color: _selectedGender == 'Laki-laki'
                                    ? const Color(0xFF2563EB)
                                    : const Color(0xFFE2E8F0),
                              ),
                            ),
                            child: RadioListTile<String>(
                              title: const Text('Laki-laki'),
                              value: 'Laki-laki',
                              groupValue: _selectedGender,
                              activeColor: const Color(0xFF2563EB),
                              onChanged: (val) {
                                if (val != null) {
                                  setState(() {
                                    _selectedGender = val;
                                  });
                                }
                              },
                            ),
                          ),
                        ),
                        const SizedBox(width: 12),
                        Expanded(
                          child: Container(
                            decoration: BoxDecoration(
                              color: Colors.white,
                              borderRadius: BorderRadius.circular(10),
                              border: Border.all(
                                color: _selectedGender == 'Perempuan'
                                    ? const Color(0xFF2563EB)
                                    : const Color(0xFFE2E8F0),
                              ),
                            ),
                            child: RadioListTile<String>(
                              title: const Text('Perempuan'),
                              value: 'Perempuan',
                              groupValue: _selectedGender,
                              activeColor: const Color(0xFF2563EB),
                              onChanged: (val) {
                                if (val != null) {
                                  setState(() {
                                    _selectedGender = val;
                                  });
                                }
                              },
                            ),
                          ),
                        ),
                      ],
                    ),
                    const SizedBox(height: 16),
                    TextFormField(
                      controller: _phoneController,
                      keyboardType: TextInputType.phone,
                      inputFormatters: [
                        FilteringTextInputFormatter.digitsOnly,
                      ],
                      decoration: InputDecoration(
                        labelText: 'Nomor Telepon',
                        hintText: 'Contoh: 08123456789',
                        border: OutlineInputBorder(borderRadius: BorderRadius.circular(10)),
                        filled: true,
                        fillColor: Colors.white,
                      ),
                      validator: (val) {
                        if (val == null || val.trim().isEmpty) {
                          return 'Nomor telepon wajib diisi';
                        }
                        if (!RegExp(r'^[0-9]+$').hasMatch(val)) {
                          return 'Nomor telepon hanya boleh angka';
                        }
                        return null;
                      },
                    ),
                    const SizedBox(height: 16),
                    TextFormField(
                      controller: _addressController,
                      maxLines: 3,
                      decoration: InputDecoration(
                        labelText: 'Alamat',
                        hintText: 'Masukkan alamat lengkap',
                        border: OutlineInputBorder(borderRadius: BorderRadius.circular(10)),
                        filled: true,
                        fillColor: Colors.white,
                      ),
                      validator: (val) {
                        if (val == null || val.trim().isEmpty) {
                          return 'Alamat wajib diisi';
                        }
                        return null;
                      },
                    ),
                    const SizedBox(height: 28),
                    SizedBox(
                      width: double.infinity,
                      height: 48,
                      child: ElevatedButton(
                        onPressed: _save,
                        style: ElevatedButton.styleFrom(
                          backgroundColor: const Color(0xFF2563EB),
                          foregroundColor: Colors.white,
                          shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(10),
                          ),
                        ),
                        child: Text(
                          isEdit ? 'Simpan Perubahan' : 'Tambah Siswa',
                          style: const TextStyle(
                            fontSize: 16,
                            fontWeight: FontWeight.bold,
                          ),
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ),
    );
  }
}
