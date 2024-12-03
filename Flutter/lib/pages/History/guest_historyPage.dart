import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:safeshroom/Style/FontStyle.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/pages/Component/BotomNavbar.dart';
import 'package:safeshroom/pages/Component/CustomAppBar.dart';
import 'package:safeshroom/pages/Component/floatingAction.dart';

class guest_historyPage extends StatefulWidget {
  const guest_historyPage({super.key});

  @override
  State<guest_historyPage> createState() => _guest_historyPageState();
}

class _guest_historyPageState extends State<guest_historyPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(title: 'Library'),
      body: Container(
        child: Center(
          child: Column(
            children: [
              Text('You need to sign in to acces this feature mate'),
              SizedBox(
                height: 30,
              ),
              ElevatedButton(
                  onPressed: () {
                    context.go(RouteConstants.signin);
                  },
                  style: ElevatedButton.styleFrom(
                    backgroundColor: Colors.green,
                    side: BorderSide(color: Colors.black),
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(30.0),
                    ),
                    minimumSize: Size(100, 50),
                  ),
                  child: Text(
                    'Signup',
                    style: ButtonTextStyle,
                  ))
            ],
          ),
        ),
      ),
      floatingActionButton: floatingAction(),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomNavbar(currentTab: RouteConstants.history),
    );
  }
}
