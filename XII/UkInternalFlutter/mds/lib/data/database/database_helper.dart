import 'package:cloud_firestore/cloud_firestore.dart';
import '../models/student_model.dart';

class DatabaseHelper {
  static final DatabaseHelper instance = DatabaseHelper._init();
  final FirebaseFirestore _firestore = FirebaseFirestore.instance;

  DatabaseHelper._init();

  CollectionReference get _studentsCollection => _firestore.collection('students');

  Stream<List<StudentModel>> get studentsStream {
    return _studentsCollection
        .orderBy('created_at', descending: true)
        .snapshots()
        .map((snapshot) {
      return snapshot.docs.map((doc) => StudentModel.fromFirestore(doc)).toList();
    });
  }

  Future<List<StudentModel>> getAllStudents() async {
    final querySnapshot = await _studentsCollection
        .orderBy('created_at', descending: true)
        .get();

    return querySnapshot.docs
        .map((doc) => StudentModel.fromFirestore(doc))
        .toList();
  }

  Future<String> insertStudent(StudentModel student) async {
    final docRef = await _studentsCollection.add(student.toMap());
    return docRef.id;
  }

  Future<void> updateStudent(StudentModel student) async {
    if (student.id == null) return;
    await _studentsCollection.doc(student.id).update(student.toMap());
  }

  Future<void> deleteStudent(String id) async {
    await _studentsCollection.doc(id).delete();
  }

  Future<StudentModel?> getStudentByNis(String nis, {String? excludeId}) async {
    final query = await _studentsCollection.where('nis', isEqualTo: nis).get();

    for (var doc in query.docs) {
      if (excludeId != null && doc.id == excludeId) {
        continue;
      }
      return StudentModel.fromFirestore(doc);
    }
    return null;
  }
}
