import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';

class SummaryPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.green[50],
        elevation: 0,
        leading: IconButton(
          icon: Icon(Icons.arrow_back, color: Colors.black),
          onPressed: () {
            // Add navigation logic
          },
        ),
        title: Text('Summary Result', style: TextStyle(color: Colors.black)),
      ),
      body: Container(
        color: const Color(0xFF406363), // Background color for entire screen
        child: Column(
          children: [
            SizedBox(height: 30,),
            // Mushroom Image
            Container(
              height: 200,
              width: double.infinity,
              margin: EdgeInsets.symmetric(horizontal: 16),
              decoration: BoxDecoration(
                image: DecorationImage(
                  image: AssetImage('images/landing.jpg'),
                  fit: BoxFit.cover,
                ),
              borderRadius: BorderRadius.circular(16),
              border: Border.all(
                color: Colors.white,
                width: 2,
              )
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
                      'Tiram Mushroom',
                      style: TitleTextStyle
                    ),
                    // Subtitle Section
                    Text('Not Poisonous',style: SubtitleTextStyle,),
                    SizedBox(height: 12),
                    // Description
                    Text(
                      'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
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
                    Text(
                      '• Sauteed Oyster Mushrooms Recipe\n'
                      '• Ingredients: \n'
                      '  - 200 grams of oyster mushrooms\n'
                      '  - 2 tablespoons of olive oil (or any cooking oil)\n'
                      '  - 2 cloves of garlic, minced\n'
                      '  - 1 tablespoon of butter (optional)\n'
                      '• Salt and pepper to taste\n'
                      '• Fresh parsley or cilantro for garnish (optional)\n'
                      '• A splash of lemon juice (optional)',
                      style: TextStyle(
                        fontSize: 16,
                        color: Colors.white,
                      ),
                    ),
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
                      // Add "Save To Library" functionality
                    },
                    style: ElevatedButton.styleFrom(
                      foregroundColor: Colors.black, backgroundColor: Colors.white,
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(16),
                      ),
                    ),
                    child: Padding(
                      padding: EdgeInsets.symmetric(vertical: 8, horizontal: 16),
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
