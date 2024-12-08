import 'package:flutter/material.dart';
import 'package:safeshroom/models/mushroom.dart';
import 'package:safeshroom/models/recomendation.dart';
import 'package:safeshroom/services/urlVariable.dart';

class HistoryListTile extends StatelessWidget {
  final VoidCallback? onTap; // Made optional
  final Mushroom  mushroom;
  final Recommendation? recommendation; // Made optional

  const HistoryListTile({
    Key? key,
    required this.mushroom,
    this.recommendation, // Optional recommendation
    this.onTap,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: onTap, // Use onTap if provided
      child: Column(
        children: [
          const SizedBox(height: 8),
          Container(
            margin: const EdgeInsets.symmetric(vertical: 4, horizontal: 8),
            width: MediaQuery.of(context).size.width * 0.9,
            height: 100,
            child: Stack(
              children: [
                // Background Image
                ClipRRect(
                  borderRadius: BorderRadius.circular(15),
                  child: Image.network(
                    '$imageUrl/${mushroom.photo}',
                    width: double.infinity,
                    height: double.infinity,
                    fit: BoxFit.cover,
                  ),
                ),
                // Gradient Overlay
                Container(
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(15),
                    gradient: LinearGradient(
                      begin: Alignment.bottomCenter,
                      end: Alignment.topCenter,
                      colors: [
                        Colors.black.withOpacity(0.7),
                        Colors.transparent,
                      ],
                    ),
                  ),
                ),
                // Content
                Padding(
                  padding: const EdgeInsets.all(16.0),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.end,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        mushroom.isPoisonous ? 'Poisonous' : 'Not Poisonous',
                        style: const TextStyle(
                          fontSize: 14,
                          color: Colors.white,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                      const SizedBox(height: 2.0),
                      Text(
                        mushroom.name,
                        style: const TextStyle(
                          fontWeight: FontWeight.bold,
                          fontSize: 16,
                          color: Colors.white,
                        ),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
