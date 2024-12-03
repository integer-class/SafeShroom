import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/models/mushroom.dart';
import 'package:safeshroom/pages/Component/BotomNavbar.dart';
import 'package:safeshroom/pages/Component/CategoryButton.dart';
import 'package:safeshroom/pages/Component/CustomAppBar.dart';
import 'package:safeshroom/pages/Component/CustomSearchButton.dart';
import 'package:safeshroom/pages/Component/MushroomList.dart';
import 'package:safeshroom/pages/Component/floatingAction.dart';

class Cataloguepage extends StatefulWidget {
  const Cataloguepage({super.key});

  @override
  State<Cataloguepage> createState() => _CataloguepageState();
}

// Define the Mushroom list using the Mushroom class
final List<Mushroom> mushroomItems = [
  
];

class _CataloguepageState extends State<Cataloguepage> {
  

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(
        title: 'Catalogue',
        onSettingsPressed: () {
          // Handle settings button press
        },
      ),
      body: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          SizedBox(height: 10),
          Container(
            margin: EdgeInsets.only(left: 10, right: 10),
            child: CustomSearchButton(onPressed: () {}),
          ),
          Padding(
            padding: EdgeInsets.only(left: 14, top: 8, right: 14),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  'Category',
                  style: SectionTextStyle,
                ),
                SizedBox(height: 10),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    CategoryButton(
                      text: 'Edible',
                      onPressed: () {},
                      backgroundImage: 'images/Edible.png',
                    ),
                    SizedBox(width: 30),
                    CategoryButton(
                      text: 'Inedible',
                      onPressed: () {},
                      backgroundImage: 'images/InEdible.png',
                    ),
                  ],
                ),
                SizedBox(height: 8),
                Text(
                  'Mushroom List',
                  style: SectionTextStyle,
                ),
                const Divider(
                  thickness: 1.5,
                  color: Colors.black,
                ),
              ],
            ),
          ),
          // Use Expanded to constrain ListView height
          Expanded(
            child: ListView(
              children: mushroomItems.map((mushroom) {
                return MushroomListTile(
                  mushroom: mushroom,
                  onTap: () {
                    // Handle tile tap
                    print('Selected: ${mushroom.name}');
                  },
                );
              }).toList(),
            ),
          ),
        ],
      ),
      floatingActionButton: floatingAction(),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomNavbar(currentTab: RouteConstants.catalogue ,),
    );
  }
}

