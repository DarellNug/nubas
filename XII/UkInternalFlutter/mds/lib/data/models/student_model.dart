import 'package:cloud_firestore/cloud_firestore.dart';

class StudentModel {
  final String? id;
  final String nis;
  final String name;
  final String className;
  final String gender;
  final String phone;
  final String address;
  final String? photoUrl;
  final String createdAt;

  StudentModel({
    this.id,
    required this.nis,
    required this.name,
    required this.className,
    required this.gender,
    required this.phone,
    required this.address,
    this.photoUrl,
    required this.createdAt,
  });

  Map<String, dynamic> toMap() {
    return {
      'nis': nis,
      'name': name,
      'class_name': className,
      'gender': gender,
      'phone': phone,
      'address': address,
      'photo_url': photoUrl,
      'created_at': createdAt,
    };
  }

  factory StudentModel.fromMap(Map<String, dynamic> map, {String? id}) {
    return StudentModel(
      id: id,
      nis: map['nis'] as String? ?? '',
      name: map['name'] as String? ?? '',
      className: map['class_name'] as String? ?? '',
      gender: map['gender'] as String? ?? '',
      phone: map['phone'] as String? ?? '',
      address: map['address'] as String? ?? '',
      photoUrl: map['photo_url'] as String?,
      createdAt: map['created_at'] as String? ?? '',
    );
  }

  factory StudentModel.fromFirestore(DocumentSnapshot doc) {
    final data = doc.data() as Map<String, dynamic>? ?? {};
    return StudentModel.fromMap(data, id: doc.id);
  }

  StudentModel copyWith({
    String? id,
    String? nis,
    String? name,
    String? className,
    String? gender,
    String? phone,
    String? address,
    String? photoUrl,
    String? createdAt,
  }) {
    return StudentModel(
      id: id ?? this.id,
      nis: nis ?? this.nis,
      name: name ?? this.name,
      className: className ?? this.className,
      gender: gender ?? this.gender,
      phone: phone ?? this.phone,
      address: address ?? this.address,
      photoUrl: photoUrl ?? this.photoUrl,
      createdAt: createdAt ?? this.createdAt,
    );
  }
}
