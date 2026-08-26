import 'package:flutter/material.dart';
import '../core/constants/app_constants.dart';

class AuthProvider extends ChangeNotifier {
  bool _isAuthenticated = false;
  bool _isLoading = false;
  String? _errorMessage;
  String _currentUsername = '';

  bool get isAuthenticated => _isAuthenticated;
  bool get isLoading => _isLoading;
  String? get errorMessage => _errorMessage;
  String get currentUsername => _currentUsername;

  Future<bool> login(String username, String password) async {
    _isLoading = true;
    _errorMessage = null;
    notifyListeners();

    await Future.delayed(const Duration(milliseconds: 600));

    if (username.trim() == AppConstants.adminUsername &&
        password.trim() == AppConstants.adminPassword) {
      _isAuthenticated = true;
      _currentUsername = username.trim();
      _isLoading = false;
      _errorMessage = null;
      notifyListeners();
      return true;
    } else {
      _isAuthenticated = false;
      _isLoading = false;
      _errorMessage = 'Username atau Password salah!';
      notifyListeners();
      return false;
    }
  }

  void logout() {
    _isAuthenticated = false;
    _currentUsername = '';
    _errorMessage = null;
    notifyListeners();
  }

  void clearError() {
    _errorMessage = null;
    notifyListeners();
  }
}
