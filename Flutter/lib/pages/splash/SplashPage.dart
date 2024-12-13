import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/services/AuthService.dart';

class SplashPage extends StatefulWidget {
  const SplashPage({super.key});

  @override
  State<SplashPage> createState() => _SplashPageState();
}

class _SplashPageState extends State<SplashPage> {
  final AuthService authService = AuthService();
  @override
  void initState() {
    super.initState();
    _checkLoginStatus();
  }

  Future<void> _checkLoginStatus() async {
    bool isLoggedin = await authService.isLoggedIn();

    await Future.delayed(const Duration(seconds: 3));

    if (!isLoggedin) {
      context.go(RouteConstants.landing);
    } else {
      context.go(RouteConstants.home);
    }
  }

  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
        color: const Color.fromARGB(255, 210, 236, 180),
      ),
      child: Center(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            SizedBox(
              height: 150,
              width: 150,
              child: Image.asset('images/Logo1.png'),
            ),
            
            
          ],
        ),
      ),
    );
  }
}
