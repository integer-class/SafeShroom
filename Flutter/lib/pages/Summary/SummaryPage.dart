import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';

class SummaryPage extends StatelessWidget {
  final dynamic mushroom; // Add these fields to accept data
  final dynamic recommendation;

  SummaryPage({required this.mushroom, required this.recommendation});

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
            SizedBox(
              height: 30,
            ),
            // Mushroom Image
            Container(
              height: 200,
              width: double.infinity,
              margin: EdgeInsets.symmetric(horizontal: 16),
              decoration: BoxDecoration(
                image: DecorationImage(
                  image: NetworkImage(
                      'http://13.70.136.185/${mushroom['photo'] ?? 'mushrooms/pi318.jpg'}'),
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
                      mushroom['name'] ??
                          'Unknown Mushroom', // Safe access for name
                      style: TitleTextStyle,
                    ),
                    // Subtitle Section
                    Text(
                      mushroom['is_poisonous'] == true
                          ? 'Poisonous'
                          : 'Not Poisonous',
                      style: SubtitleTextStyle,
                    ),
                    SizedBox(height: 12),
                    // Description
                    Text(
                      mushroom['description'] ??
                          'No description available', // Safe access for description
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
                    if (recommendation != null) ...[
                      Text(
                        recommendation['title'] ??
                            'No Title', // Safe access for title
                        style: TextStyle(
                          fontSize: 16,
                          color: Colors.white,
                        ),
                      ),
                      SizedBox(height: 8),
                      Text(
                        recommendation['description'] ??
                            'No description available', // Safe access for description
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
                    onPressed: () {},
                    style: ElevatedButton.styleFrom(
                      foregroundColor: Colors.black,
                      backgroundColor: Colors.white,
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(16),
                      ),
                    ),
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
