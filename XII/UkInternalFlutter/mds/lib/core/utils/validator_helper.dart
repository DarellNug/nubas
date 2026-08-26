class ValidatorHelper {
  static String? validateRequired(String? value, String fieldName) {
    if (value == null || value.trim().isEmpty) {
      return '$fieldName tidak boleh kosong';
    }
    return null;
  }

  static String? validateNis(String? value) {
    if (value == null || value.trim().isEmpty) {
      return 'NIS tidak boleh kosong';
    }
    if (!RegExp(r'^[0-9]+$').hasMatch(value.trim())) {
      return 'NIS harus berupa angka';
    }
    if (value.trim().length < 4) {
      return 'NIS minimal 4 digit';
    }
    return null;
  }

  static String? validatePhone(String? value) {
    if (value == null || value.trim().isEmpty) {
      return 'Nomor telepon tidak boleh kosong';
    }
    if (!RegExp(r'^[0-9+\-\s]+$').hasMatch(value.trim())) {
      return 'Format nomor telepon tidak valid';
    }
    return null;
  }
}
