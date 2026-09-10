import 'package:firebase_core/firebase_core.dart';
import 'package:flutter/material.dart';
import 'package:uk/firebase_options.dart';

import 'pages/log.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp(options: DefaultFirebaseOptions.currentPlatform);
  runApp(const Ukif());
}

class Ukif extends StatelessWidget {
  const Ukif({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: const log(),
    );
  }
}
