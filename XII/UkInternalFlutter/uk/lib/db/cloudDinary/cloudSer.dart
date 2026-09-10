import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:image_picker/image_picker.dart';
import 'cloudCre.dart';

class ser {
  static String? lastError;

  static Future<String?> uploadImage(XFile imageFile) async {
    try {
      lastError = null;
      final cloudName = cloudCre.cloudinaryCloudName;
      final uploadPreset = cloudCre.cloudinaryUploadPreset;

      final url = Uri.parse(
        'https://api.cloudinary.com/v1_1/$cloudName/image/upload',
      );

      final request = http.MultipartRequest('POST', url);

      final bytes = await imageFile.readAsBytes();
      final multipartFile = http.MultipartFile.fromBytes(
        'file',
        bytes,
        filename: imageFile.name,
      );

      request.fields['upload_preset'] = uploadPreset;
      request.files.add(multipartFile);

      final streamedResponse = await request.send();
      final response = await http.Response.fromStream(streamedResponse);

      if (response.statusCode == 200 || response.statusCode == 201) {
        final Map<String, dynamic> responseData = jsonDecode(response.body);
        return responseData['secure_url'] as String? ?? responseData['url'] as String?;
      } else {
        lastError = 'HTTP ${response.statusCode}: ${response.body}';
        return null;
      }
    } catch (e) {
      lastError = e.toString();
      return null;
    }
  }
}
