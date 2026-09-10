import 'package:flutter/material.dart';
import '../db/firebase/dtSiswa.dart';
import '../db/firebase/fbSer.dart';
import 'form_siswa.dart';

class ListSiswa extends StatefulWidget {
  final String? initialClass;
  final String? initialGender;

  const ListSiswa({
    super.key,
    this.initialClass,
    this.initialGender,
  });

  @override
  State<ListSiswa> createState() => _ListSiswaState();
}

class _ListSiswaState extends State<ListSiswa> {
  final TextEditingController _searchController = TextEditingController();
  String _searchQuery = '';
  late String _selectedClass;
  late String _selectedGender;
  final List<String> _genderList = ['Semua', 'Laki-laki', 'Perempuan'];
  late final Stream<List<dtSiswa>> _studentsStream;

  @override
  void initState() {
    super.initState();
    _selectedClass = widget.initialClass ?? 'Semua';
    _selectedGender = widget.initialGender ?? 'Semua';
    // Cache stream sekali — mencegah StreamBuilder restart saat setState dipanggil
    _studentsStream = FirebaseService.getStudentsStream();
  }

  @override
  void dispose() {
    _searchController.dispose();
    super.dispose();
  }

  void _confirmDelete(BuildContext context, dtSiswa student) {
    showDialog(
      context: context,
      builder: (ctx) => AlertDialog(
        title: const Text('Hapus Siswa'),
        content: Text('Yakin ingin menghapus ${student.name}?'),
        actions: [
          TextButton(
            onPressed: () => Navigator.pop(ctx),
            child: const Text('Batal'),
          ),
          ElevatedButton(
            onPressed: () async {
              Navigator.pop(ctx);
              if (student.id != null) {
                await FirebaseService.deleteStudent(student.id!);
                if (mounted) {
                  ScaffoldMessenger.of(context).showSnackBar(
                    const SnackBar(
                      content: Text('Data siswa berhasil dihapus'),
                      backgroundColor: Colors.green,
                    ),
                  );
                }
              }
            },
            style: ElevatedButton.styleFrom(backgroundColor: Colors.red),
            child: const Text('Hapus', style: TextStyle(color: Colors.white)),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFFF8FAFC),
      appBar: AppBar(
        backgroundColor: Colors.white,
        elevation: 0,
        iconTheme: const IconThemeData(color: Color(0xFF1E293B)),
        title: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              'Daftar Siswa',
              style: TextStyle(
                color: Color(0xFF1E293B),
                fontWeight: FontWeight.bold,
                fontSize: 18,
              ),
            ),
            if (_selectedClass != 'Semua' || _selectedGender != 'Semua')
              Text(
                'Filter: ${_selectedClass != 'Semua' ? _selectedClass : ''}${_selectedClass != 'Semua' && _selectedGender != 'Semua' ? ' • ' : ''}${_selectedGender != 'Semua' ? _selectedGender : ''}',
                style: const TextStyle(
                  color: Color(0xFF2563EB),
                  fontSize: 12,
                  fontWeight: FontWeight.w600,
                ),
              ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        backgroundColor: const Color(0xFF2563EB),
        foregroundColor: Colors.white,
        onPressed: () {
          Navigator.push(
            context,
            MaterialPageRoute(builder: (_) => const FormSiswa()),
          );
        },
        child: const Icon(Icons.add),
      ),
      body: StreamBuilder<List<dtSiswa>>(
        stream: _studentsStream,
        builder: (context, snapshot) {
          if (snapshot.connectionState == ConnectionState.waiting) {
            return const Center(child: CircularProgressIndicator());
          }

          final allStudents = snapshot.data ?? [];

          final classSet = <String>{};
          for (final s in allStudents) {
            final c = s.className.trim();
            if (c.isNotEmpty) {
              classSet.add(c);
            }
          }
          if (_selectedClass != 'Semua' && _selectedClass.trim().isNotEmpty) {
            classSet.add(_selectedClass.trim());
          }
          final otherClasses = classSet.toList()..sort();
          final classList = ['Semua', ...otherClasses];

          final filtered = allStudents.where((s) {
            final matchesSearch = s.name.toLowerCase().contains(_searchQuery.toLowerCase()) ||
                s.nis.toLowerCase().contains(_searchQuery.toLowerCase());
            final matchesClass = _selectedClass == 'Semua' || s.className == _selectedClass;
            final matchesGender = _selectedGender == 'Semua' || s.gender == _selectedGender;
            return matchesSearch && matchesClass && matchesGender;
          }).toList();

          final isFiltered = _selectedClass != 'Semua' || _selectedGender != 'Semua' || _searchQuery.isNotEmpty;

          return Column(
            children: [
              Container(
                color: Colors.white,
                padding: const EdgeInsets.fromLTRB(16, 12, 16, 12),
                child: Column(
                  children: [
                    TextField(
                      controller: _searchController,
                      onChanged: (val) {
                        setState(() {
                          _searchQuery = val;
                        });
                      },
                      decoration: InputDecoration(
                        hintText: 'Cari nama atau NIS...',
                        prefixIcon: const Icon(Icons.search, color: Color(0xFF64748B)),
                        suffixIcon: _searchQuery.isNotEmpty
                            ? IconButton(
                                icon: const Icon(Icons.clear, color: Color(0xFF64748B), size: 18),
                                onPressed: () {
                                  _searchController.clear();
                                  setState(() {
                                    _searchQuery = '';
                                  });
                                },
                              )
                            : null,
                        contentPadding: const EdgeInsets.symmetric(horizontal: 14, vertical: 10),
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10),
                        ),
                        filled: true,
                        fillColor: const Color(0xFFF8FAFC),
                      ),
                    ),
                    const SizedBox(height: 10),
                    Row(
                      children: [
                        Expanded(
                          child: DropdownButtonFormField<String>(
                            value: _selectedClass,
                            isExpanded: true,
                            decoration: InputDecoration(
                              labelText: 'Filter Kelas',
                              contentPadding: const EdgeInsets.symmetric(horizontal: 10, vertical: 8),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                              filled: true,
                              fillColor: const Color(0xFFF8FAFC),
                            ),
                            items: classList.map((c) {
                              return DropdownMenuItem(
                                value: c,
                                child: Text(
                                  c,
                                  overflow: TextOverflow.ellipsis,
                                  style: const TextStyle(fontSize: 13),
                                ),
                              );
                            }).toList(),
                            onChanged: (val) {
                              if (val != null) {
                                setState(() {
                                  _selectedClass = val;
                                });
                              }
                            },
                          ),
                        ),
                        const SizedBox(width: 8),
                        Expanded(
                          child: DropdownButtonFormField<String>(
                            value: _selectedGender,
                            isExpanded: true,
                            decoration: InputDecoration(
                              labelText: 'Filter Gender',
                              contentPadding: const EdgeInsets.symmetric(horizontal: 10, vertical: 8),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                              filled: true,
                              fillColor: const Color(0xFFF8FAFC),
                            ),
                            items: _genderList.map((g) {
                              return DropdownMenuItem(
                                value: g,
                                child: Text(
                                  g,
                                  overflow: TextOverflow.ellipsis,
                                  style: const TextStyle(fontSize: 13),
                                ),
                              );
                            }).toList(),
                            onChanged: (val) {
                              if (val != null) {
                                setState(() {
                                  _selectedGender = val;
                                });
                              }
                            },
                          ),
                        ),
                      ],
                    ),
                    if (isFiltered) ...[
                      const SizedBox(height: 10),
                      Container(
                        padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 6),
                        decoration: BoxDecoration(
                          color: const Color(0xFFEFF6FF),
                          borderRadius: BorderRadius.circular(8),
                          border: Border.all(color: const Color(0xFFBFDBFE)),
                        ),
                        child: Row(
                          children: [
                            const Icon(Icons.filter_alt, size: 16, color: Color(0xFF2563EB)),
                            const SizedBox(width: 6),
                            Expanded(
                              child: Text(
                                'Mode Filter Aktif (${filtered.length} siswa)',
                                style: const TextStyle(
                                  fontSize: 12,
                                  fontWeight: FontWeight.w600,
                                  color: Color(0xFF1E3A8A),
                                ),
                              ),
                            ),
                            InkWell(
                              onTap: () {
                                setState(() {
                                  _selectedClass = 'Semua';
                                  _selectedGender = 'Semua';
                                  _searchQuery = '';
                                  _searchController.clear();
                                });
                              },
                              child: const Row(
                                mainAxisSize: MainAxisSize.min,
                                children: [
                                  Icon(Icons.restart_alt, size: 14, color: Color(0xFF2563EB)),
                                  SizedBox(width: 2),
                                  Text(
                                    'Reset',
                                    style: TextStyle(
                                      fontSize: 12,
                                      fontWeight: FontWeight.bold,
                                      color: Color(0xFF2563EB),
                                    ),
                                  ),
                                ],
                              ),
                            ),
                          ],
                        ),
                      ),
                    ],
                  ],
                ),
              ),
              Expanded(
                child: filtered.isEmpty
                    ? Center(
                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: [
                            const Icon(
                              Icons.search_off,
                              size: 48,
                              color: Color(0xFF94A3B8),
                            ),
                            const SizedBox(height: 12),
                            const Text(
                              'Tidak ada data siswa yang cocok',
                              style: TextStyle(
                                fontSize: 16,
                                fontWeight: FontWeight.w600,
                                color: Color(0xFF64748B),
                              ),
                            ),
                            const SizedBox(height: 6),
                            const Text(
                              'Coba ubah kriteria pencarian atau reset filter',
                              style: TextStyle(
                                fontSize: 13,
                                color: Color(0xFF94A3B8),
                              ),
                            ),
                            if (isFiltered) ...[
                              const SizedBox(height: 16),
                              ElevatedButton.icon(
                                onPressed: () {
                                  setState(() {
                                    _selectedClass = 'Semua';
                                    _selectedGender = 'Semua';
                                    _searchQuery = '';
                                    _searchController.clear();
                                  });
                                },
                                icon: const Icon(Icons.restart_alt, size: 16),
                                label: const Text('Reset Filter'),
                                style: ElevatedButton.styleFrom(
                                  backgroundColor: const Color(0xFF2563EB),
                                  foregroundColor: Colors.white,
                                  shape: RoundedRectangleBorder(
                                    borderRadius: BorderRadius.circular(8),
                                  ),
                                ),
                              ),
                            ],
                          ],
                        ),
                      )
                    : ListView.builder(
                        padding: const EdgeInsets.all(16),
                        itemCount: filtered.length,
                        itemBuilder: (context, index) {
                          final student = filtered[index];
                          return Container(
                            margin: const EdgeInsets.only(bottom: 12),
                            decoration: BoxDecoration(
                              color: Colors.white,
                              borderRadius: BorderRadius.circular(12),
                              border: Border.all(color: const Color(0xFFE2E8F0)),
                            ),
                            child: ListTile(
                              contentPadding: const EdgeInsets.all(12),
                              leading: CircleAvatar(
                                radius: 24,
                                backgroundColor: const Color(0xFFEFF6FF),
                                backgroundImage: student.photoUrl != null && student.photoUrl!.isNotEmpty
                                    ? NetworkImage(student.photoUrl!)
                                    : null,
                                child: student.photoUrl == null || student.photoUrl!.isEmpty
                                    ? const Icon(Icons.person, color: Color(0xFF2563EB))
                                    : null,
                              ),
                              title: Text(
                                student.name,
                                style: const TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontSize: 15,
                                  color: Color(0xFF1E293B),
                                ),
                              ),
                              subtitle: Column(
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  const SizedBox(height: 4),
                                  Text('NIS: ${student.nis} • ${student.className}'),
                                  Text('${student.gender} • ${student.phone}'),
                                ],
                              ),
                              trailing: Row(
                                mainAxisSize: MainAxisSize.min,
                                children: [
                                  IconButton(
                                    icon: const Icon(Icons.edit, color: Color(0xFF2563EB), size: 20),
                                    onPressed: () {
                                      Navigator.push(
                                        context,
                                        MaterialPageRoute(
                                          builder: (_) => FormSiswa(student: student),
                                        ),
                                      );
                                    },
                                  ),
                                  IconButton(
                                    icon: const Icon(Icons.delete, color: Colors.red, size: 20),
                                    onPressed: () => _confirmDelete(context, student),
                                  ),
                                ],
                              ),
                            ),
                          );
                        },
                      ),
              ),
            ],
          );
        },
      ),
    );
  }
}
