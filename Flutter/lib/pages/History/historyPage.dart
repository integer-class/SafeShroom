import 'package:flutter/material.dart';
import 'package:safeshroom/controller/route_constants.dart';
import 'package:safeshroom/models/mushroom.dart';
import 'package:safeshroom/models/recomendation.dart';
import 'package:safeshroom/pages/Component/BotomNavbar.dart';
import 'package:safeshroom/pages/Component/CustomAppBar.dart';
import 'package:safeshroom/pages/Component/floatingAction.dart';
import 'package:safeshroom/pages/Component/historylist.dart';
import 'package:safeshroom/pages/Summary/SummaryPage.dart';
import 'package:safeshroom/services/AuthService.dart';
import 'package:safeshroom/services/HistoryService.dart';

class HistoryPage extends StatefulWidget {
  const HistoryPage({super.key});

  @override
  State<HistoryPage> createState() => _HistoryPageState();
}

class _HistoryPageState extends State<HistoryPage> {
  bool historyIsEmpty = false;  
  List<Mushroom> mushrooms = [];  
  List<Recommendation> recommendations = [];  
  String? userId;  

  @override
  void initState() {
    super.initState();
    _fetchHistory();  
  }

  // Function to fetch history
  Future<void> _fetchHistory() async {
  try {
    final historyService = Historyservice();
    String? userId = await AuthService().getUserId();    // Corrected class name
    final historyData = await historyService.getHistory(userId: userId);  // Replace with your actual API method

    setState(() {
      // Map the data into proper model objects
      mushrooms = (historyData['mushrooms'] as List<dynamic>)
          .map((mushroomJson) => Mushroom.fromJson(mushroomJson))
          .toList();

      recommendations = (historyData['recommendations'] as List<dynamic>)
          .map((recJson) => Recommendation.fromJson(recJson))
          .toList();

      historyIsEmpty = mushrooms.isEmpty;  // Set the empty state flag
    });
  } catch (error) {
    print('Error fetching history: $error');
  }
}


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(title: 'Library'),
      body: SingleChildScrollView(
      child: Center(
        child: historyIsEmpty
            ? Text(
                'No Saved Mushrooms',
                style: TextStyle(color: Colors.black, fontSize: 18, fontWeight: FontWeight.w600),
              )
            : Column(
                children: List.generate(mushrooms.length, (index) {
                  return HistoryListTile(
                    mushroom: mushrooms[index],
                    recommendation: recommendations.isNotEmpty
                        ? recommendations[index]
                        : null,
                    onTap: () {
                      Recommendation? matchingRecommendation = recommendations
                          .where((rec) => rec.mushroomId == mushrooms[index].id)
                          .isNotEmpty
                          ? recommendations.firstWhere((rec) => rec.mushroomId == mushrooms[index].id)
                          : null;

                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => SummaryPage(
                            mushroom: mushrooms[index],
                            recommendation: matchingRecommendation,
                          ),
                        ),
                      );
                    },
                  );
                }),
              ),
      ),
    ),

      floatingActionButton: floatingAction(),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomNavbar(currentTab: RouteConstants.history),
    );
  }
}
