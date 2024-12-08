import 'package:flutter/material.dart';

class HistoryListTile extends StatelessWidget {
  
  final VoidCallback onTap;

  const HistoryListTile({
    Key? key,
    
    required this.onTap,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        SizedBox(height: 8),
        Container(
          margin: EdgeInsets.symmetric(vertical: 4,horizontal: 8),
          width: MediaQuery.of(context).size.width * 0.9, 
          height: 100,
          decoration: BoxDecoration(
            borderRadius: BorderRadius.circular(15),
            image: DecorationImage(
              image: AssetImage('images/Edible.png'),
              fit: BoxFit.cover,
            ),
            gradient: LinearGradient(
              begin:Alignment.bottomCenter,
              end: Alignment.topCenter,
              colors:[
                Colors.black.withOpacity(0.7),
                Colors.transparent,
              ],
           ),
          ),
          child: Padding(
            padding: const EdgeInsets.all(16.0),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.end,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  'data',
                  style: TextStyle(
                    fontWeight: FontWeight.bold,
                    fontSize: 16,
                    color: Colors.white
                  ),
                ),
        
              ],
            ),
            ),
        ),
      ],
    );
  }
}

