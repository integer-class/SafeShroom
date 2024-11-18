import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';
import 'package:safeshroom/pages/CataloguePage.dart';
import 'package:safeshroom/pages/Component/carousel_loading.dart';
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
      body: Container(
        decoration: BoxDecoration(
          //add background color for the entire body
          color: Color.fromARGB(255, 190, 204, 198),
        ),
        child: Column(
          children: [
            Container(
              margin: EdgeInsets.all(40),
              decoration: BoxDecoration(
                //create a circular rectangle as the border
                borderRadius: BorderRadius.circular(20),
                color: Colors.white,
              ),
              child: Center(
                child: Column(
                  children: [
                    SizedBox(
                      height: 8,
                    ),
                    Text(
                      'Hello Nanda',
                      style: HelloTextStyle,
                      textAlign: TextAlign.center,
                    ),
                    SizedBox(
                      height: 6,
                    ),
                    Text(
                      'Welcome to SafeShroom',
                      style: WelcomeTextStyle,
                      textAlign: TextAlign.center,
                    ),
                  ],
                ),
              ),
            ),
            SizedBox(
              height: 10,
            ),
            Container(
              margin: EdgeInsets.only(right: 100),
              child: Column(
                children: [
                  Text(
                    'Article',
                    style: SectionTextStyle,
                  ),
                  CarouselLoading()
                ],
              ),
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        child: Icon(Icons.scanner_outlined),
        onPressed: () {},
      ),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomAppBar(
        shape: CircularNotchedRectangle(),
        notchMargin: 10,
        child: Container(
          height: 60,
          child: Row(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: [
              Row(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  MaterialButton(
                    minWidth: 40,
                    onPressed: () {
                      setState(() {
                        currentScreen = Homepage();
                        currentTab = 0;
                      });
                    },
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Icon(
                          Icons.home_outlined,
                          color: currentTab == 0? Colors.blue : Colors.white,
                        ),
                      ],
                    ),
                  ),

                  MaterialButton(
                    minWidth: 40,
                    onPressed: () {
                      setState(() {
                        currentScreen = Cataloguepage();
                        currentTab = 1;
                      });
                    },
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Icon(
                          Icons.list_outlined,
                          color: currentTab == 0? Colors.blue : Colors.white,
                        ),
                      ],
                    ),
                  ),

                  MaterialButton(
                    minWidth: 40,
                    onPressed: () {
                      setState(() {
                        currentScreen = Profilepage();
                        currentTab = 3;
                      });
                    },
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Icon(
                          Icons.person,
                          color: currentTab == 0? Colors.blue : Colors.white,
                        ),
                      ],
                    ),
                  ),
                
                ],
              )
            ],
          ),
        ),
      ),
    );
  }
}
