<!DOCTYPE html>
<html>

<head>
    <title>OBJ File Loader</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="http://threejs.org/build/three.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.156.1/three.min.js"
        integrity="sha512-V9mpjsMwBSamMZSFBEbQL+ft1be7xPMU3t27EaGdDE9ctlBSTWJyAW+jKBPUkJYf7YyOWLXpLGwttdoiEv1hrA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.156.1/three.js"
        integrity="sha512-bq+JGRG6XAA4s5NjbdHiHnm/vFUBQ/AXBQZbChQNzaMxUguqCXHbWigCwaxwb8KuiA+EhBC3+p1Qo8pWV4TwVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.156.1/three.module.min.js"
        integrity="sha512-MGqAo5dNtAY8zVzkOVQO8KCunJZRIdIfDF7L3ovOLYQEA480eWQ63b1MF3mryRe1mH6D8ai6JG5P4MwZ/PZLhA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.156.1/three.module.js"
        integrity="sha512-J1eg11ZhjdqafUuGmmDFXA85QtBEFy5ZLC5S8J/0zioBEOlg48XxM9ro2iAdr2QFT7U37KEO/4ByunQiBciQMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/loaders/FBXLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/loaders/MTLLoader.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/loaders/OBJLoader.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/three@0.156.1/examples/jsm/loaders/OBJLoader.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/controls/OrbitControls.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/three@0.156.1/examples/jsm/controls/OrbitControls.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/libs/fflate.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/three@0.156.1/examples/jsm/libs/fflate.module.js"></script>

</head>

<body>

    {{-- <script>
        let scene, camera, renderer;

        scene = new THREE.Scene();
        camera = new THREE.PerspectiveCamera(20, window.innerWidth / window.innerHeight, 1, 2000);
        camera.position.z = 250;

        var light = new THREE.AmbientLight(0xffffff);
        scene.add(light);

        light = new THREE.HemisphereLight(0xffffff, 0x444444, 1.0);
        light.position.set(0, 1, 0);
        scene.add(light);

        var directionalLight = new THREE.DirectionalLight(0xffeedd);
        directionalLight.position.set(0, 1, 0).normalize();
        scene.add(directionalLight);

        var mesh = null;

        var objLoader = new THREE.OBJLoader();
        objLoader.load(
            '/storage/Models/test.obj',
            function(object) {
                mesh = object;
                mesh.position.set(0, -50, 0); // adjust the position of the model
                mesh.scale.set(10, 10, 10); // adjust the scale of the model
                scene.add(mesh);
            });

        renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setClearColor(0xccccff);
        document.body.appendChild(renderer.domElement);

        controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.addEventListener('change', renderer);

        animate();

        function animate() {
            renderer.render(scene, camera);
            requestAnimationFrame(animate);
        }
    </script> --}}

    <script type="module">
        // Import the necessary modules
        import * as THREE from 'three';
        import {
            OBJLoader
        } from 'three/examples/jsm/loaders/OBJLoader.js';

        // Create a scene
        var scene = new THREE.Scene();

        // Create a camera
        var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 5;

        // Create a renderer
        var renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        // Create an OBJLoader instance
        var loader = new OBJLoader();

        // Load an OBJ file
        loader.load(
            '/storage/Models/test.obj', // replace this with the path to your .obj file
            function(object) {
                scene.add(object);
            },
            function(xhr) {
                console.log((xhr.loaded / xhr.total * 100) + '% loaded');
            },
            function(error) {
                console.log('An error happened');
            }
        );

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
        animate();
    </script>
</body>

</html>
