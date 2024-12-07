import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/models/mushroom.dart';
import 'package:safeshroom/models/recomendation.dart';
import 'package:safeshroom/pages/Component/BotomNavbar.dart';
import 'package:safeshroom/pages/Component/CategoryButton.dart';
import 'package:safeshroom/pages/Component/CustomAppBar.dart';
import 'package:safeshroom/pages/Component/CustomSearchButton.dart';
import 'package:safeshroom/pages/Component/MushroomList.dart';
import 'package:safeshroom/pages/Component/floatingAction.dart';
import 'package:safeshroom/pages/Summary/SummaryPage.dart';
import 'package:safeshroom/services/MushroomService.dart';

class CataloguePage extends StatefulWidget {
  const CataloguePage({super.key});

  @override
  State<CataloguePage> createState() => _CataloguePageState();
}

class _CataloguePageState extends State<CataloguePage> {
  final MushroomService mushroomService = MushroomService();

  List<Mushroom> allMushrooms = [];
  List<Mushroom> displayedMushrooms = [];
  List<Recommendation> recommendations = [];
  String currentCategory = 'All'; // Default category
  bool isLoading = true;
  String? errorMessage;

  @override
  void initState() {
    super.initState();
    _fetchMushroomData();
  }

  Future<void> _fetchMushroomData() async {
  try {
    final result = await mushroomService.getMushroom();
    if (result['success'] == true) {
      final mushrooms = (result['mushrooms'] as List?)
          ?.map((data) => Mushroom.fromJson(data))
          .toList() ?? [];
      final fetchRecommendation = (result['recommendation'] as List?)
          ?.map((data) => Recommendation.fromJson(data))
          .toList() ?? [];

      setState(() {
        allMushrooms = mushrooms;
        displayedMushrooms = mushrooms; // Default: show all
        recommendations = fetchRecommendation;
        isLoading = false;
      });
    } else {
      setState(() {
        errorMessage = result['message'];
        isLoading = false;
      });
    }
  } catch (e) {
    setState(() {
      errorMessage = 'An error occurred: ${e.toString()}';
      isLoading = false;
    });
  }
}

  void _filterMushrooms(String category) {
    setState(() {
      currentCategory = category;
      if (category == 'Edible') {
        displayedMushrooms = allMushrooms
            .where((mushroom) => mushroom.isPoisonous == false)
            .toList();
      } else if (category == 'Inedible') {
        displayedMushrooms = allMushrooms
            .where((mushroom) => mushroom.isPoisonous == true)
            .toList();
      } else {
        displayedMushrooms = allMushrooms; // Show all mushrooms
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(
        title: 'Catalogue',
        onSettingsPressed: () {
          // Handle settings button press
        },
      ),
      body: isLoading
          ? Center(child: CircularProgressIndicator())
          : errorMessage != null
              ? Center(child: Text(errorMessage!))
              : Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    SizedBox(height: 10),
                    Container(
                      margin: EdgeInsets.symmetric(horizontal: 10),
                      child: CustomSearchButton(onPressed: () {}),
                    ),
                    Padding(
                      padding:
                          EdgeInsets.symmetric(horizontal: 14, vertical: 8),
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text('Category', style: SectionTextStyle),
                          SizedBox(height: 10),
                          Row(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              CategoryButton(
                                text: 'Edible',
                                onPressed: () => _filterMushrooms('Edible'),
                                backgroundImage: 'images/Edible.png',
                              ),
                              SizedBox(width: 30),
                              CategoryButton(
                                text: 'Inedible',
                                onPressed: () => _filterMushrooms('Inedible'),
                                backgroundImage: 'images/InEdible.png',
                              ),
                            ],
                          ),
                          SizedBox(height: 8),
                          Text('Mushroom List', style: SectionTextStyle),
                          const Divider(thickness: 1.5, color: Colors.black),
                        ],
                      ),
                    ),
                    Expanded(
                      child: ListView.builder(
                        itemCount: displayedMushrooms.length,
                        itemBuilder: (context, index) {
                          final mushroom = displayedMushrooms[index];
                          return MushroomListTile(
                                  mushroom: mushroom,
                                  onTap: () {
                                    Recommendation? matchingRecommendation = recommendations
                                        .where((rec) => rec.mushroomId == mushroom.id)
                                        .isNotEmpty ? recommendations.firstWhere((rec) => rec.mushroomId == mushroom.id) : null;
                                    Navigator.push(
                                      context,
                                      MaterialPageRoute(
                                        builder: (context) => SummaryPage(
                                          mushroom: mushroom,
                                          recommendation: matchingRecommendation,
                                        ),
                                      ),
                                    );
                                  },
                                );
                        },
                      ),
                    ),
                  ],
                ),
      floatingActionButton: floatingAction(),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomNavbar(
        currentTab: RouteConstants.catalogue,
      ),
    );
  }
}
