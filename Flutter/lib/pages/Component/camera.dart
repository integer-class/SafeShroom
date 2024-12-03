import 'package:flutter/material.dart';
import 'package:camera/camera.dart';

class CameraPage extends StatefulWidget {
  const CameraPage({Key? key}) : super(key: key);

  @override
  _CameraPageState createState() => _CameraPageState();
}

class _CameraPageState extends State<CameraPage> with WidgetsBindingObserver {
  CameraController? _cameraController;
  List<CameraDescription> _cameras = [];
  bool _isFlashOn = false;
  int _selectedCameraIndex = 0;

  @override
  void initState() {
    super.initState();
    WidgetsBinding.instance.addObserver(this);
    _initializeCameras();
  }

  @override
  void dispose() {
    WidgetsBinding.instance.removeObserver(this);
    _cameraController?.dispose();
    super.dispose();
  }

  @override
  void didChangeAppLifecycleState(AppLifecycleState state) {
    if (_cameraController == null || !_cameraController!.value.isInitialized) {
      return;
    }

    if (state == AppLifecycleState.inactive) {
      _cameraController?.dispose();
    } else if (state == AppLifecycleState.resumed) {
      _initializeCameras();
    }
  }

  Future<void> _initializeCameras() async {
    try {
      _cameras = await availableCameras();

      if (_cameras.isEmpty) {
        print('No cameras found');
        return;
      }

      _selectedCameraIndex = _cameras.indexWhere(
          (camera) => camera.lensDirection == CameraLensDirection.front);

      if (_selectedCameraIndex == -1) {
        _selectedCameraIndex = 0;
      }

      await _initializeCameraController(_cameras[_selectedCameraIndex]);
    } on CameraException catch (e) {
      print('Error initializing cameras: ${e.description}');
    }
  }

  Future<void> _initializeCameraController(CameraDescription camera) async {
    final controller = CameraController(
      camera,
      ResolutionPreset.high,
      enableAudio: false,
      imageFormatGroup: ImageFormatGroup.jpeg,
    );

    try {
      await controller.initialize();

      if (mounted) {
        setState(() {
          _cameraController = controller;
        });
      }
    } on CameraException catch (e) {
      print('Camera initialization error: ${e.description}');
    }
  }

  Future<void> _toggleFlash() async {
    if (_cameraController == null) return;

    try {
      setState(() {
        _isFlashOn = !_isFlashOn;
      });

      await _cameraController!
          .setFlashMode(_isFlashOn ? FlashMode.torch : FlashMode.off);
    } catch (e) {
      print('Flash toggle error: $e');
    }
  }

  Future<void> _switchCamera() async {
    if (_cameras.length <= 1) return;

    _selectedCameraIndex = (_selectedCameraIndex + 1) % _cameras.length;
    await _cameraController?.dispose();

    await _initializeCameraController(_cameras[_selectedCameraIndex]);
  }

  @override
  Widget build(BuildContext context) {
    if (_cameraController == null || !_cameraController!.value.isInitialized) {
      return const Center(child: CircularProgressIndicator());
    }

    return Scaffold(
      body: SafeArea(
        child: Column(
          children: [
            Expanded(
              child: Stack(
                fit: StackFit.expand,
                children: [
                  CameraPreview(_cameraController!),
                  Positioned(
                    top: 10,
                    left: 10,
                    child: IconButton(
                      icon: const Icon(Icons.arrow_back, color: Colors.white),
                      onPressed: () => Navigator.pop(context),
                    ),
                  ),
                  Positioned(
                    top: 10,
                    right: 10,
                    child: IconButton(
                      icon: Icon(
                        _isFlashOn ? Icons.flash_on : Icons.flash_off,
                        color: Colors.white,
                      ),
                      onPressed: _toggleFlash,
                    ),
                  ),
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.all(16.0),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [
                  IconButton(
                    icon:
                        const Icon(Icons.camera, color: Colors.black, size: 60),
                    onPressed: () {}, // Implement camera capture logic
                  ),
                  IconButton(
                    icon: const Icon(
                      Icons.flip_camera_android,
                      color: Colors.black,
                      size: 30,
                    ),
                    onPressed: _switchCamera,
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
