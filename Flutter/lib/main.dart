import 'package:flutter/material.dart';
import 'package:safeshroom/controller/Router.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp.router(
      title: 'SafeShroom',
      debugShowCheckedModeBanner: false,
      routerConfig: appRouter,
    );
  }
}
