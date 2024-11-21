import 'package:flutter/material.dart';
// import 'package:go_router/go_router.dart';

class BottomNavbar extends StatelessWidget {
  const BottomNavbar({super.key});

  

  @override
  Widget build(BuildContext context) {
    return BottomAppBar(
      shape: CircularNotchedRectangle(),
      notchMargin: 10,
      child: Container(
        height: 60,
        child: Expanded(
          child: Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              MaterialButton(
                minWidth: 40,
                onPressed: () {},
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    
                    IconButton(
                      icon: Icon(
                        Icons.home,
                        
                      ),
                      onPressed: () {
                        // context.go('/home');
                      },
                      
                    ),
                    
                    IconButton(
                      icon: Icon(
                        Icons.list,
                        
                      ),
                      onPressed: () {
                        // context.go('/Catalogue');
                      },
                    ),
          
                    IconButton(
                      icon: Icon(
                        Icons.notification_add,
                        
                      ),
                      onPressed: () {
                        // context.go('/notification');
                      },
                      
                    ),
          
                    IconButton(
                      icon: Icon(
                        Icons.person,
                        
                      ),
                      onPressed: () {
                        // context.go('/Scanner');
                      },
                    ),
                    
                    
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
