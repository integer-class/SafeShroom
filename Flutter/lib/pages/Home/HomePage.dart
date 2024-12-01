import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/pages/Component/BotomNavbar.dart';
import 'package:safeshroom/pages/Component/CustomAppBar.dart';
import 'package:safeshroom/pages/Component/carouselArticle.dart';
import 'package:safeshroom/pages/Component/carouselInformation.dart';
import 'package:safeshroom/pages/Component/floatingAction.dart';


class Homepage extends StatefulWidget {
  const Homepage({super.key});
  @override
  State<Homepage> createState() => _HomepageState();
}

class _HomepageState extends State<Homepage> {
  

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(
        title: 'SafeShroom',
        onSettingsPressed: () {
          //routing ke setting gaada konten bingung diisi apaan
        },
      ),
      body: SafeArea(
          child: SingleChildScrollView(
        child: Container(
          height: MediaQuery.of(context).size.height,
          decoration: BoxDecoration(
            //add background color for the entire body
            color: Colors.white,
          ),
          child: Column(
            children: [
              SizedBox(
                height: 8,
              ),
              Padding(
                padding: EdgeInsets.only(left: 14, top: 12, right: 14),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text('Hello Bagas', style: HelloTextStyle),
                    SizedBox(height: 6), // Increased spacing between texts
                    Text('Welcome to Safeshroom', style: WelcomeTextStyle),
                    SizedBox(height: 12), // Reduced spacing before "Article"
                    Text(
                      'Article',
                      style: SectionTextStyle,
                      textAlign: TextAlign.left,
                    ),
                    const Divider(
                      color: Colors.black,
                      height: 25,
                      thickness: 2,
                      indent: 5,
                      endIndent: 5,
                    ),
                    carouselArticle(),
                    SizedBox(
                        height: 12), // Reduced spacing before "Information"
                    Text(
                      'Information',
                      style: SectionTextStyle,
                      textAlign: TextAlign.left,
                    ),
                    const Divider(
                      color: Colors.black,
                      height: 25,
                      thickness: 2,
                      indent: 5,
                      endIndent: 5,
                    ),
                    carouselInformation(),
                  ],
                ),
              ),
            ],
          ),
        ),
      )),
      floatingActionButton: floatingAction(),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomNavbar(currentTab: RouteConstants.home,),
    );
  }
}
