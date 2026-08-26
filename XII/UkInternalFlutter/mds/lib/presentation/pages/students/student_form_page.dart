import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../../../core/constants/app_colors.dart';
import '../../../core/constants/app_constants.dart';
import '../../../core/utils/validator_helper.dart';
import '../../../data/models/student_model.dart';
import '../../../providers/student_provider.dart';
import '../../widgets/custom_text_field.dart';

class StudentFormPage extends StatefulWidget {
  final StudentModel? student;

  const StudentFormPage({super.key, this.student});

  @override
  State<StudentFormPage> createState() => _StudentFormPageState();
}

class _StudentFormPageState extends State<StudentFormPage> {
  final _formKey = GlobalKey<FormState>();

  late final TextEditingController _nisController;
  late final TextEditingController _nameController;
  late final TextEditingController _phoneController;
  late final TextEditingController _addressController;

  late String _selectedClass;
  late String _selectedGender;
  bool _isSubmitting = false;

  bool get isEditMode => widget.student != null;

  @override
  void initState() {
    super.initState();
    _nisController = TextEditingController(text: widget.student?.nis ?? '');
    _nameController = TextEditingController(text: widget.student?.name ?? '');
    _phoneController = TextEditingController(text: widget.student?.phone ?? '');
    _addressController = TextEditingController(text: widget.student?.address ?? '');

    _selectedClass = widget.student?.className ?? AppConstants.classList.first;
    _selectedGender = widget.student?.gender ?? AppConstants.genderList.first;
  }

  @override
  void dispose() {
    _nisController.dispose();
    _nameController.dispose();
    _phoneController.dispose();
    _addressController.dispose();
    super.dispose();
  }

  void _saveStudent() async {
    if (!_formKey.currentState!.validate()) {
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(
          content: Text('Harap lengkapi semua kolom yang wajib diisi!'),
          backgroundColor: AppColors.danger,
          behavior: SnackBarBehavior.floating,
        ),
      );
      return;
    }

    setState(() {
      _isSubmitting = true;
    });

    final provider = context.read<StudentProvider>();
    final newStudent = StudentModel(
      id: widget.student?.id,
      nis: _nisController.text.trim(),
      name: _nameController.text.trim(),
      className: _selectedClass,
      gender: _selectedGender,
      phone: _phoneController.text.trim(),
      address: _addressController.text.trim(),
      createdAt: widget.student?.createdAt ?? DateTime.now().toIso8601String(),
    );

    bool success;
    if (isEditMode) {
      success = await provider.updateStudent(newStudent);
    } else {
      success = await provider.addStudent(newStudent);
    }

    setState(() {
      _isSubmitting = false;
    });

    if (!mounted) return;

    if (success) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text(
            isEditMode
                ? 'Data siswa ${newStudent.name} berhasil diperbarui!'
                : 'Data siswa ${newStudent.name} berhasil disimpan ke sistem!',
          ),
          backgroundColor: AppColors.success,
          behavior: SnackBarBehavior.floating,
        ),
      );
      Navigator.of(context).pop();
    } else {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text(provider.errorMessage ?? 'Gagal menyimpan data siswa!'),
          backgroundColor: AppColors.danger,
          behavior: SnackBarBehavior.floating,
        ),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: AppColors.background,
      appBar: AppBar(
        title: Text(isEditMode ? 'Edit Data Siswa' : 'Tambah Siswa Baru'),
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(20),
        child: Form(
          key: _formKey,
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: [
              Container(
                padding: const EdgeInsets.all(20),
                decoration: BoxDecoration(
                  color: AppColors.surface,
                  borderRadius: BorderRadius.circular(16),
                  border: Border.all(color: AppColors.border),
                  boxShadow: const [
                    BoxShadow(
                      color: AppColors.cardShadow,
                      blurRadius: 8,
                      offset: Offset(0, 2),
                    ),
                  ],
                ),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    CustomTextField(
                      controller: _nisController,
                      label: 'Nomor Induk Siswa (NIS) *',
                      hint: 'Contoh: 230101',
                      prefixIcon: Icons.badge_outlined,
                      keyboardType: TextInputType.number,
                      validator: ValidatorHelper.validateNis,
                    ),
                    const SizedBox(height: 18),
                    CustomTextField(
                      controller: _nameController,
                      label: 'Nama Lengkap Siswa *',
                      hint: 'Contoh: Ahmad Rizky Pratama',
                      prefixIcon: Icons.person_outline_rounded,
                      validator: (v) => ValidatorHelper.validateRequired(v, 'Nama lengkap'),
                    ),
                    const SizedBox(height: 18),
                    const Text(
                      'Kelas *',
                      style: TextStyle(
                        fontSize: 14,
                        fontWeight: FontWeight.w600,
                        color: AppColors.textPrimary,
                      ),
                    ),
                    const SizedBox(height: 8),
                    Container(
                      padding: const EdgeInsets.symmetric(horizontal: 14),
                      decoration: BoxDecoration(
                        color: AppColors.surface,
                        borderRadius: BorderRadius.circular(12),
                        border: Border.all(color: AppColors.border),
                      ),
                      child: DropdownButtonHideUnderline(
                        child: DropdownButton<String>(
                          value: _selectedClass,
                          isExpanded: true,
                          icon: const Icon(
                            Icons.keyboard_arrow_down_rounded,
                            color: AppColors.textSecondary,
                          ),
                          style: const TextStyle(
                            fontSize: 14,
                            color: AppColors.textPrimary,
                            fontWeight: FontWeight.w500,
                          ),
                          items: AppConstants.classList.map((className) {
                            return DropdownMenuItem<String>(
                              value: className,
                              child: Text(className),
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
                    ),
                    const SizedBox(height: 18),
                    const Text(
                      'Jenis Kelamin *',
                      style: TextStyle(
                        fontSize: 14,
                        fontWeight: FontWeight.w600,
                        color: AppColors.textPrimary,
                      ),
                    ),
                    const SizedBox(height: 8),
                    Row(
                      children: AppConstants.genderList.map((gender) {
                        final isSelected = _selectedGender == gender;
                        return Expanded(
                          child: Padding(
                            padding: EdgeInsets.only(
                              right: gender == AppConstants.genderList.first ? 8 : 0,
                              left: gender == AppConstants.genderList.last ? 8 : 0,
                            ),
                            child: InkWell(
                              onTap: () {
                                setState(() {
                                  _selectedGender = gender;
                                });
                              },
                              borderRadius: BorderRadius.circular(12),
                              child: Container(
                                padding: const EdgeInsets.symmetric(vertical: 12),
                                decoration: BoxDecoration(
                                  color: isSelected
                                      ? AppColors.primary.withValues(alpha: 0.08)
                                      : AppColors.surface,
                                  borderRadius: BorderRadius.circular(12),
                                  border: Border.all(
                                    color: isSelected
                                        ? AppColors.primary
                                        : AppColors.border,
                                    width: isSelected ? 1.5 : 1,
                                  ),
                                ),
                                child: Row(
                                  mainAxisAlignment: MainAxisAlignment.center,
                                  children: [
                                    Icon(
                                      gender == 'Laki-laki'
                                          ? Icons.male_rounded
                                          : Icons.female_rounded,
                                      size: 18,
                                      color: isSelected
                                          ? AppColors.primary
                                          : AppColors.textSecondary,
                                    ),
                                    const SizedBox(width: 6),
                                    Text(
                                      gender,
                                      style: TextStyle(
                                        fontSize: 13,
                                        fontWeight: isSelected
                                            ? FontWeight.w700
                                            : FontWeight.w500,
                                        color: isSelected
                                            ? AppColors.primary
                                            : AppColors.textSecondary,
                                      ),
                                    ),
                                  ],
                                ),
                              ),
                            ),
                          ),
                        );
                      }).toList(),
                    ),
                    const SizedBox(height: 18),
                    CustomTextField(
                      controller: _phoneController,
                      label: 'Nomor Telepon / WhatsApp *',
                      hint: 'Contoh: 081234567890',
                      prefixIcon: Icons.phone_outlined,
                      keyboardType: TextInputType.phone,
                      validator: ValidatorHelper.validatePhone,
                    ),
                    const SizedBox(height: 18),
                    CustomTextField(
                      controller: _addressController,
                      label: 'Alamat Lengkap *',
                      hint: 'Contoh: Jl. Merdeka No. 12, RT 01/RW 02',
                      prefixIcon: Icons.location_on_outlined,
                      maxLines: 3,
                      validator: (v) => ValidatorHelper.validateRequired(v, 'Alamat lengkap'),
                    ),
                  ],
                ),
              ),
              const SizedBox(height: 24),
              ElevatedButton.icon(
                onPressed: _isSubmitting ? null : _saveStudent,
                style: ElevatedButton.styleFrom(
                  padding: const EdgeInsets.symmetric(vertical: 16),
                ),
                icon: _isSubmitting
                    ? const SizedBox.shrink()
                    : const Icon(Icons.save_rounded, size: 20),
                label: _isSubmitting
                    ? const SizedBox(
                        height: 20,
                        width: 20,
                        child: CircularProgressIndicator(
                          strokeWidth: 2,
                          color: Colors.white,
                        ),
                      )
                    : Text(
                        isEditMode ? 'Simpan Perubahan' : 'Simpan Data Siswa',
                        style: const TextStyle(
                          fontSize: 15,
                          fontWeight: FontWeight.w700,
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
