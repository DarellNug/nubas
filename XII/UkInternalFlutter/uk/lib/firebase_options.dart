import 'package:firebase_core/firebase_core.dart' show FirebaseOptions;
import 'package:flutter/foundation.dart'
    show defaultTargetPlatform, kIsWeb, TargetPlatform;

class DefaultFirebaseOptions {
  static FirebaseOptions get currentPlatform {
    if (kIsWeb) {
      return web;
    }
    switch (defaultTargetPlatform) {
      case TargetPlatform.android:
        return android;
      case TargetPlatform.iOS:
        return ios;
      case TargetPlatform.macOS:
        return macos;
      case TargetPlatform.windows:
        return windows;
      default:
        throw UnsupportedError(
          'DefaultFirebaseOptions are not supported for this platform.',
        );
    }
  }

  static const FirebaseOptions web = FirebaseOptions(
    apiKey: "AIzaSyCCyOULiI9EU6Zai0X5c-ZD6nfs8WklEoQ",
    authDomain: "ukif-fae25.firebaseapp.com",
    projectId: "ukif-fae25",
    storageBucket: "ukif-fae25.firebasestorage.app",
    messagingSenderId: "804569523780",
    appId: "1:804569523780:web:7d53e195c52e132ab73e11",
    measurementId: "G-H32BKTJCKT"
  );

  static const FirebaseOptions android = FirebaseOptions(
    apiKey: "AIzaSyCCyOULiI9EU6Zai0X5c-ZD6nfs8WklEoQ",
    authDomain: "ukif-fae25.firebaseapp.com",
    projectId: "ukif-fae25",
    storageBucket: "ukif-fae25.firebasestorage.app",
    messagingSenderId: "804569523780",
    appId: "1:804569523780:android:7d53e195c52e132ab73e11",
  );

  static const FirebaseOptions ios = FirebaseOptions(
    apiKey: "AIzaSyCCyOULiI9EU6Zai0X5c-ZD6nfs8WklEoQ",
    authDomain: "ukif-fae25.firebaseapp.com",
    projectId: "ukif-fae25",
    storageBucket: "ukif-fae25.firebasestorage.app",
    messagingSenderId: "804569523780",
    appId: "1:804569523780:ios:7d53e195c52e132ab73e11",
    iosBundleId: "com.example.uk",
  );

  static const FirebaseOptions macos = FirebaseOptions(
    apiKey: "AIzaSyCCyOULiI9EU6Zai0X5c-ZD6nfs8WklEoQ",
    authDomain: "ukif-fae25.firebaseapp.com",
    projectId: "ukif-fae25",
    storageBucket: "ukif-fae25.firebasestorage.app",
    messagingSenderId: "804569523780",
    appId: "1:804569523780:ios:7d53e195c52e132ab73e11",
    iosBundleId: "com.example.uk",
  );

  static const FirebaseOptions windows = FirebaseOptions(
    apiKey: "AIzaSyCCyOULiI9EU6Zai0X5c-ZD6nfs8WklEoQ",
    authDomain: "ukif-fae25.firebaseapp.com",
    projectId: "ukif-fae25",
    storageBucket: "ukif-fae25.firebasestorage.app",
    messagingSenderId: "804569523780",
    appId: "1:804569523780:web:7d53e195c52e132ab73e11",
    measurementId: "G-H32BKTJCKT"
  );
}