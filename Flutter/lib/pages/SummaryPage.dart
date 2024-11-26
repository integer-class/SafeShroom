import 'package:flutter/material.dart';
import 'package:safeshroom/Style/FontStyle.dart';

class SummaryPage extends StatefulWidget {
  const SummaryPage({super.key});

  @override
  State<SummaryPage> createState() => _SummaryPageState();
}

class _SummaryPageState extends State<SummaryPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.green[50], // Warna background mirip
        elevation: 0, // Menghilangkan bayangan AppBar
        leading: IconButton(
          icon: Icon(Icons.arrow_back, color: Colors.black),
          onPressed: () {
            // Tambahkan fungsi untuk tombol kembali
          },
        ),
        title: Row(
          mainAxisAlignment:
              MainAxisAlignment.center, // Memastikan teks di tengah
          children: [
            Text('Summary Result', style: SubtitleTextStyle2),
          ],
        ),
        actions: [
          SizedBox(
              width: 48), // Memberikan ruang di kanan agar teks tetap di tengah
        ],
      ),
      body: Container(
        decoration: BoxDecoration(
          color: Colors.green[50],
        ),
        child: Column(children: [
          Container(
            margin: EdgeInsets.only(left: 40, right: 40),
            height: 200,
            width:  300,
          )
        ]),
      ),
    );
  }
}
