import 'dart:async';
import 'package:flutter/material.dart';
import '../core/constants/app_constants.dart';
import '../data/database/database_helper.dart';
import '../data/models/student_model.dart';

class StudentProvider extends ChangeNotifier {
  final DatabaseHelper _dbHelper = DatabaseHelper.instance;
  StreamSubscription<List<StudentModel>>? _streamSubscription;

  List<StudentModel> _students = [];
  bool _isLoading = false;
  String _searchQuery = '';
  String _selectedClass = 'Semua';
  String? _errorMessage;

  StudentProvider() {
    _initStream();
  }

  void _initStream() {
    _isLoading = true;
    notifyListeners();

    _streamSubscription?.cancel();
    _streamSubscription = _dbHelper.studentsStream.listen(
      (data) {
        _students = data;
        _isLoading = false;
        _errorMessage = null;
        notifyListeners();
      },
      onError: (error) {
        _isLoading = false;
        _errorMessage = 'Gagal menyinkronkan data dari Firestore';
        notifyListeners();
      },
    );
  }

  @override
  void dispose() {
    _streamSubscription?.cancel();
    super.dispose();
  }

  List<StudentModel> get students => _students;
  bool get isLoading => _isLoading;
  String get searchQuery => _searchQuery;
  String get selectedClass => _selectedClass;
  String? get errorMessage => _errorMessage;

  List<StudentModel> get filteredStudents {
    return _students.where((student) {
      final matchesSearch = student.name.toLowerCase().contains(_searchQuery.toLowerCase()) ||
          student.nis.toLowerCase().contains(_searchQuery.toLowerCase());
      
      final matchesClass = _selectedClass == 'Semua' || student.className == _selectedClass;

      return matchesSearch && matchesClass;
    }).toList();
  }

  int get totalStudents => _students.length;

  int get totalMale => _students.where((s) => s.gender == 'Laki-laki').length;

  int get totalFemale => _students.where((s) => s.gender == 'Perempuan').length;

  List<String> get availableClasses {
    final set = <String>{...AppConstants.classList};
    for (final s in _students) {
      if (s.className.isNotEmpty) {
        set.add(s.className);
      }
    }
    final list = set.toList();
    list.sort();
    return list;
  }

  int countByClass(String className) {
    return _students.where((s) => s.className == className).length;
  }

  Future<void> fetchStudents() async {
    _isLoading = true;
    _errorMessage = null;
    notifyListeners();

    try {
      _students = await _dbHelper.getAllStudents();
    } catch (e) {
      _errorMessage = 'Gagal memuat data siswa dari Firestore';
    } finally {
      _isLoading = false;
      notifyListeners();
    }
  }

  Future<bool> addStudent(StudentModel student) async {
    try {
      final existing = await _dbHelper.getStudentByNis(student.nis);
      if (existing != null) {
        _errorMessage = 'NIS ${student.nis} sudah terdaftar!';
        notifyListeners();
        return false;
      }

      await _dbHelper.insertStudent(student);
      return true;
    } catch (e) {
      _errorMessage = 'Gagal menambahkan data siswa ke Firestore';
      notifyListeners();
      return false;
    }
  }

  Future<bool> updateStudent(StudentModel student) async {
    try {
      final existing = await _dbHelper.getStudentByNis(student.nis, excludeId: student.id);
      if (existing != null) {
        _errorMessage = 'NIS ${student.nis} sudah digunakan siswa lain!';
        notifyListeners();
        return false;
      }

      await _dbHelper.updateStudent(student);
      return true;
    } catch (e) {
      _errorMessage = 'Gagal memperbarui data siswa di Firestore';
      notifyListeners();
      return false;
    }
  }

  Future<bool> deleteStudent(String id) async {
    try {
      await _dbHelper.deleteStudent(id);
      return true;
    } catch (e) {
      _errorMessage = 'Gagal menghapus data siswa dari Firestore';
      notifyListeners();
      return false;
    }
  }

  void setSearchQuery(String query) {
    _searchQuery = query;
    notifyListeners();
  }

  void setSelectedClass(String className) {
    _selectedClass = className;
    notifyListeners();
  }

  void resetFilter() {
    _searchQuery = '';
    _selectedClass = 'Semua';
    notifyListeners();
  }

  void clearError() {
    _errorMessage = null;
    notifyListeners();
  }
}
