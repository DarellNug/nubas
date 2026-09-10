import 'package:cloud_firestore/cloud_firestore.dart';

class dtSiswa {
  final String? id;
  final String nis;
  final String name;
  final String className;
  final String gender;
  final String phone;
  final String address;
  final String? photoUrl;
  final String createdAt;

  dtSiswa({
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

  factory dtSiswa.fromFirestore(DocumentSnapshot doc) {
    final data = doc.data() as Map<String, dynamic>? ?? {};
    return dtSiswa(
      id: doc.id,
      nis: data['nis'] as String? ?? '',
      name: data['name'] as String? ?? '',
      className: data['class_name'] as String? ?? '',
      gender: data['gender'] as String? ?? '',
      phone: data['phone'] as String? ?? '',
      address: data['address'] as String? ?? '',
      photoUrl: data['photo_url'] as String?,
      createdAt: data['created_at'] as String? ?? '',
    );
  }
}