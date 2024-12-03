import 'package:flutter/material.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/pages/Component/BotomNavbar.dart';
import 'package:safeshroom/pages/Component/CustomAppBar.dart';
import 'package:safeshroom/pages/Component/floatingAction.dart';



class Historypage extends StatefulWidget {
  const Historypage({super.key});

  @override
  State<Historypage> createState() => _HistorypageState();
}

class _HistorypageState extends State<Historypage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(title: 'Library'),
      body: Center(
      
      
      ),
      floatingActionButton: floatingAction(),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomNavbar(currentTab: RouteConstants.history),
    );
  }
}