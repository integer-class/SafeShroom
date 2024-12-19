import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';
import 'package:safeshroom/services/AuthService.dart';
import 'package:safeshroom/services/HistoryService.dart';

class SummaryPage extends StatefulWidget {
  final dynamic mushroom; // Add these fields to accept data
  final dynamic recommendation;

  SummaryPage({required this.mushroom, required this.recommendation});

  @override
  _SummaryPageState createState() => _SummaryPageState();
}

class _SummaryPageState extends State<SummaryPage> {
  final AuthService authService = AuthService();
  final Historyservice historyService = Historyservice();
  bool isLoggedIn = false;
  String? _userId;

  Future<void> checkLoginStatus() async {
    bool status = await authService.isLoggedIn();
    String? Id = await authService.getUserId();
    setState(() {
      isLoggedIn = status;
      _userId = Id;
    });
  }

  Future<void> saveToHistory() async {
    
    // User is logged in, proceed to save history
    String _mushroomId = widget.mushroom.id.toString();
    String? _recommendationId = widget.recommendation?.id?.toString();

    await historyService.addHistory(
      userId: _userId!,
      mushroomId: _mushroomId,
      recommendationId: _recommendationId,
  );

    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(content: Text('Successfully saved to your history.')),
    );
  }

  @override
  void initState() {
    super.initState();
    checkLoginStatus();
  }


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.green[50],
        elevation: 0,
        leading: IconButton(
          icon: Icon(Icons.arrow_back, color: Colors.black),
          onPressed: () {
            Navigator.pop(context); // Going back to the previous page
          },
        ),
        title: Text('Summary Result', style: TextStyle(color: Colors.black)),
      ),
      body: Container(
        color: const Color(0xFF406363), // Background color for entire screen
        child: Column(
          children: [
            SizedBox(height: 30),
            // Mushroom Image
            Container(
              height: 200,
              width: double.infinity,
              margin: EdgeInsets.symmetric(horizontal: 16),
              decoration: BoxDecoration(
                image: DecorationImage(
                  image: NetworkImage(
                    'https://safeshroom.web.id/${widget.mushroom.photo ?? 'mushrooms/pi318.jpg'}',
                  ),
                  fit: BoxFit.cover,
                ),
                borderRadius: BorderRadius.circular(16),
                border: Border.all(
                  color: Colors.white,
                  width: 2,
                ),
              ),
            ),
            // Scrollable Content Section
            Expanded(
              child: SingleChildScrollView(
                padding: EdgeInsets.symmetric(horizontal: 24, vertical: 16),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    // Title Section
                    Text(
                      widget.mushroom.name ?? 'Unknown Mushroom',
                      style: TitleTextStyle,
                    ),
                    // Subtitle Section
                    Text(
                      widget.mushroom.isPoisonous == true
                          ? 'Poisonous'
                          : 'Not Poisonous',
                      style: SubtitleTextStyle,
                    ),
                    SizedBox(height: 12),
                    // Description
                    Text(
                      widget.mushroom.description ?? 'No description available',
                      style: TextStyle(
                        fontSize: 16,
                        color: Colors.white,
                      ),
                    ),
                    SizedBox(height: 24),
                    // Recipe Title
                    Text(
                      'How To Cook ??',
                      style: TextStyle(
                        fontSize: 18,
                        fontWeight: FontWeight.bold,
                        color: Colors.white,
                      ),
                    ),
                    SizedBox(height: 12),
                    // Recipe Details
                    if (widget.recommendation != null) ...[
                      Text(
                        widget.recommendation.title ?? 'No Title',
                        style: TextStyle(
                          fontSize: 16,
                          color: Colors.white,
                        ),
                      ),
                      SizedBox(height: 8),
                      Text(
                        widget.recommendation.description ??
                            'No description available',
                        style: TextStyle(
                          fontSize: 16,
                          color: Colors.white,
                        ),
                      ),
                    ] else ...[
                      Text(
                        'No recommendation available.',
                        style: TextStyle(fontSize: 16, color: Colors.white),
                      ),
                    ],
                  ],
                ),
              ),
            ),
            // Save Button
            Container(
              color: const Color(0xFF406363),
              padding: EdgeInsets.all(16.0),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  ElevatedButton(
                    onPressed: () {
                      if (isLoggedIn) {
                        saveToHistory(); // Save to history if logged in
                      } else {
                        ScaffoldMessenger.of(context).showSnackBar(
                          SnackBar(content: Text('Please log in first.')),
                        );
                      }
                    },
                    child: Padding(
                      padding:
                          EdgeInsets.symmetric(vertical: 8, horizontal: 16),
                      child: Text('Save To Library'),
                    ),
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
