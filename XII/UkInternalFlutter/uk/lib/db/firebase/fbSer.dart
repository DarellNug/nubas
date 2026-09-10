import 'package:cloud_firestore/cloud_firestore.dart';
import 'dtSiswa.dart';

class FirebaseService {
  static final FirebaseFirestore _firestore = FirebaseFirestore.instance;
  static final CollectionReference _studentsCollection = _firestore.collection('students');

  static Stream<List<dtSiswa>> getStudentsStream() {
    return _studentsCollection
        .orderBy('created_at', descending: true)
        .snapshots()
        .map((snapshot) =>
            snapshot.docs.map((doc) => dtSiswa.fromFirestore(doc)).toList());
  }

  static Future<void> addStudent(dtSiswa student) async {
    await _studentsCollection.add(student.toMap());
  }

  static Future<void> updateStudent(dtSiswa student) async {
    if (student.id != null) {
      await _studentsCollection.doc(student.id).update(student.toMap());
    }
  }

  static Future<void> deleteStudent(String id) async {
    await _studentsCollection.doc(id).delete();
  }

  static Future<List<String>> getAvailableClasses() async {
    final snap = await _studentsCollection.get();
    final set = <String>{};
    for (var doc in snap.docs) {
      final data = doc.data() as Map<String, dynamic>?;
      final c = (data?['class_name'] as String?)?.trim() ?? '';
      if (c.isNotEmpty) set.add(c);
    }
    final list = set.toList()..sort();
    return list;
  }

  static final CollectionReference _adminCollection = _firestore.collection('admin');

  static Future<void> ensureDefaultAdmin() async {
    try {
      final snapshot = await _adminCollection.limit(1).get();
      if (snapshot.docs.isEmpty) {
        await _adminCollection.add({
          'username': 'admin',
          'password': 'admin123',
          'name': 'Admin',
          'created_at': DateTime.now().toIso8601String(),
        });
      }
    } catch (_) {}
  }

  static Future<Map<String, dynamic>?> loginAdmin(String username, String password) async {
    await ensureDefaultAdmin();
    final query = await _adminCollection
        .where('username', isEqualTo: username.trim())
        .where('password', isEqualTo: password.trim())
        .limit(1)
        .get();

    if (query.docs.isNotEmpty) {
      return query.docs.first.data() as Map<String, dynamic>;
    }
    return null;
  }

  static Future<String?> registerAdmin({
    required String username,
    required String password,
    required String name,
  }) async {
    try {
      await ensureDefaultAdmin();
      final existing = await _adminCollection
          .where('username', isEqualTo: username.trim())
          .limit(1)
          .get();

      if (existing.docs.isNotEmpty) {
        return 'Username sudah digunakan, silakan pilih username lain';
      }

      await _adminCollection.add({
        'username': username.trim(),
        'password': password.trim(),
        'name': name.trim().isNotEmpty ? name.trim() : username.trim(),
        'created_at': DateTime.now().toIso8601String(),
      });

      return null;
    } catch (e) {
      return 'Gagal mendaftarkan admin: $e';
    }
  }
}