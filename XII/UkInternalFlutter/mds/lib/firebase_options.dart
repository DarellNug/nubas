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
      case TargetPlatform.linux:
        throw UnsupportedError(
          'DefaultFirebaseOptions have not been configured for linux - '
          'you can reconfigure this by running the FlutterFire CLI',
        );
      default:
        throw UnsupportedError(
          'DefaultFirebaseOptions are not supported for this platform.',
        );
    }
  }

  static const FirebaseOptions web = FirebaseOptions(
    apiKey: 'AIzaSyCOOZtMqymbCwzI2yqLDgUaaCU9sJ0pp88',
    appId: '1:40255166715:web:60d2331f6f19a41fccb85e',
    messagingSenderId: '40255166715',
    projectId: 'miss-97b6b',
    authDomain: 'miss-97b6b.firebaseapp.com',
    storageBucket: 'miss-97b6b.firebasestorage.app',
    measurementId: 'G-X8PG3CXYM8',
  );

  static const FirebaseOptions android = FirebaseOptions(
    apiKey: 'AIzaSyCOOZtMqymbCwzI2yqLDgUaaCU9sJ0pp88',
    appId: '1:40255166715:web:60d2331f6f19a41fccb85e',
    messagingSenderId: '40255166715',
    projectId: 'miss-97b6b',
    storageBucket: 'miss-97b6b.firebasestorage.app',
    measurementId: 'G-X8PG3CXYM8',
  );

  static const FirebaseOptions ios = FirebaseOptions(
    apiKey: 'AIzaSyCOOZtMqymbCwzI2yqLDgUaaCU9sJ0pp88',
    appId: '1:40255166715:ios:60d2331f6f19a41fccb85e',
    messagingSenderId: '40255166715',
    projectId: 'miss-97b6b',
    storageBucket: 'miss-97b6b.firebasestorage.app',
    iosBundleId: 'com.example.mds',
  );

  static const FirebaseOptions macos = FirebaseOptions(
    apiKey: 'AIzaSyCOOZtMqymbCwzI2yqLDgUaaCU9sJ0pp88',
    appId: '1:40255166715:ios:60d2331f6f19a41fccb85e',
    messagingSenderId: '40255166715',
    projectId: 'miss-97b6b',
    storageBucket: 'miss-97b6b.firebasestorage.app',
    iosBundleId: 'com.example.mds',
  );

  static const FirebaseOptions windows = FirebaseOptions(
    apiKey: 'AIzaSyCOOZtMqymbCwzI2yqLDgUaaCU9sJ0pp88',
    appId: '1:40255166715:web:60d2331f6f19a41fccb85e',
    messagingSenderId: '40255166715',
    projectId: 'miss-97b6b',
    authDomain: 'miss-97b6b.firebaseapp.com',
    storageBucket: 'miss-97b6b.firebasestorage.app',
    measurementId: 'G-X8PG3CXYM8',
  );
}
