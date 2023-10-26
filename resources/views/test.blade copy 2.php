<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Three.js OBJ Example</title>
    <style>
        body {
            margin: 0;
        }

        canvas {
            display: block;
        }
    </style>

    <script async src="https://unpkg.com/es-module-shims@1.8.0/dist/es-module-shims.js"></script>

    <script type="importmap">
    {
        "imports": {
        "three": "https://unpkg.com/three@0.156.1/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@0.156.1/examples/jsm/"
        }
    }
    </script>
</head>

<body>
    <script type="module">
        import * as THREE from 'three';

        import {
            OBJLoader
        } from 'three/addons/loaders/OBJLoader.js';
        import {
            OrbitControls
        } from 'three/addons/controls/OrbitControls.js';

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setClearColor(0xccccff);
        document.body.appendChild(renderer.domElement);

        camera.position.z = 0;

        var light = new THREE.AmbientLight(0xffffff);
        scene.add(light);

        light = new THREE.HemisphereLight(0xffffff, 0x444444, 1.0);
        light.position.set(0, 1, 0);
        scene.add(light);

        var directionalLight = new THREE.DirectionalLight(0xffeedd);
        directionalLight.position.set(0, 1, 0).normalize();
        scene.add(directionalLight);

        var mesh = null;

        // instantiate a loader
        const loader = new OBJLoader();

        // load a resource
        loader.load(
            // resource URL
            '/storage/Models/test.obj',
            // called when resource is loaded
            function(object) {

                mesh = object;
                mesh.position.set(0, 0, 0); // adjust the position of the model
                mesh.scale.set(10, 10, 10); // adjust the scale of the model
                scene.add(object);

            },
            // called when loading is in progresses
            function(xhr) {

                console.log((xhr.loaded / xhr.total * 100) + '% loaded');

            },
            // called when loading has errors
            function(error) {

                console.log('An error happened');

            }
        );

        const controls = new OrbitControls(camera, renderer.domElement);
        camera.position.set(0, 20, 100);
        controls.update();

        function animate() {
            requestAnimationFrame(animate);
            controls.update();
            renderer.render(scene, camera);
        }
        animate();
    </script>
</body>

</html>
