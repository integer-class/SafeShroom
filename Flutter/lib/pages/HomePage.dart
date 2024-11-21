import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';
import 'package:safeshroom/pages/CataloguePage.dart';
import 'package:safeshroom/pages/Component/BotomNavbar.dart';
import 'package:safeshroom/pages/Component/carouselArticle.dart';
import 'package:safeshroom/pages/Component/carouselInformation.dart';
import 'package:safeshroom/pages/Component/floatingAction.dart';
import 'package:safeshroom/pages/ProfilePage.dart';
import 'package:safeshroom/pages/ScanPage.dart';

class Homepage extends StatefulWidget {
  const Homepage({super.key});

  @override
  State<Homepage> createState() => _HomepageState();
}

class _HomepageState extends State<Homepage> {
  int currentTab = 0;

  final List<Widget> screens = [
    Homepage(),
    Cataloguepage(),
    Scanpage(),
    Profilepage(),
  ];

  final PageStorageBucket bucket = PageStorageBucket();
  Widget currentScreen = Homepage();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: SizedBox(
            height: 50, width: 10, child: Image.asset('images/Logo1.png')),
        title: Text(
          'SafeShroom',
          style: SubtitleTextStyle2,
          textAlign: TextAlign.left,
        ),
        //create a button with an setting icon on the right side of the bar
        actions: [
          IconButton(onPressed: () {}, icon: Image.asset("assets/Settings.png"))
        ],
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
      floatingActionButton: floatingAction(onPressed: () {}),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomNavbar(),
    );
  }
}
