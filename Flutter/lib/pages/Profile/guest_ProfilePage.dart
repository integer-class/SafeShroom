import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:safeshroom/Style/FontStyle.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/pages/Component/BotomNavbar.dart';
import 'package:safeshroom/pages/Component/floatingAction.dart';
import 'package:safeshroom/services/AuthService.dart';

class guest_ProfilePage extends StatefulWidget {
  const guest_ProfilePage({super.key});

  @override
  State<guest_ProfilePage> createState() => _guest_ProfilePageState();
}

class _guest_ProfilePageState extends State<guest_ProfilePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: SizedBox(
          height: 50,
          width: 10,
          child: Image.asset('images/Logo1.png'),
        ),
        title: Text(
          'Profile',
          style: SubtitleTextStyle2,
          textAlign: TextAlign.left,
        ),
        actions: [
          Padding(
            padding: const EdgeInsets.only(right: 15),
            child: IconButton(
              onPressed: () async {
                await AuthService().logout();
                Navigator.pushNamed(context, RouteConstants.login);
              },
              icon: Icon(Icons.logout),
            ),
          ),
        ],
      ),
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.all(16.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              SizedBox(
                height: 50,
              ),
              Center(
                child: Stack(
                  children: [
                    Container(
                      width: 120,
                      height: 120,
                      decoration: BoxDecoration(
                        shape: BoxShape.circle,
                        border: Border.all(width: 2, color: Colors.black),
                        image: DecorationImage(
                          image: AssetImage('images/Logo1.png'),
                          fit: BoxFit.cover,
                        ),
                      ),
                    ),
                  ],
                ),
              ),
              const SizedBox(height: 50),
              SizedBox(
                height: 30,
              ),
              Text(
                'You need to sign up to open this feature mate',
                style: SubtitleTextStyle2,
                textAlign: TextAlign.center,
              ),
              SizedBox(
                height: 20,
              ),
              ElevatedButton(
                style: ElevatedButton.styleFrom(
                  backgroundColor: Colors.green,
                  side: BorderSide(color: Colors.black),
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(30.0),
                  ),
                  minimumSize: Size(100, 50),
                ),
                onPressed: () {
                  context.go(RouteConstants.signup);
                },
                child: Text('SignUp', style: ButtonTextStyle),
              ),
            ],
          ),
        ),
      ),
      floatingActionButton: floatingAction(onPressed: () {}),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomNavbar(currentTab: RouteConstants.profile),
    );
  }
}
