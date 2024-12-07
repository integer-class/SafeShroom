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
          width: MediaQuery.of(context).size.width * 0.9, 
          height: 200,
          decoration: BoxDecoration(
            borderRadius: BorderRadius.circular(15),
            image: DecorationImage(
              image: AssetImage('image/Edible.png'),
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
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  'Poisonous',
                  style: TextStyle(
                    fontSize: 16,
                    color: Colors.white70),
                ),
                SizedBox(height: 8,),
                Text(
                  'data',
                  style: TextStyle(
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

