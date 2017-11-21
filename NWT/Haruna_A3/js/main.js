if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
var container, stats;
var camera, scene, renderer, controls;
var Objloader_lego;

// MOUSE CONTROLS
var mouseX = 0, mouseY = 0;
var windowHalfX = window.innerWidth / 2;
var windowHalfY = window.innerHeight / 2;

init();
animate();
function init() {
    container = document.getElementById( 'container' );
    camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 4000 );
    camera.position.set( 7, 5, 250 );
    scene = new THREE.Scene();

    var manager = new THREE.LoadingManager();
    manager.onProgress = function ( item, loaded, total ) {
        console.log( item, loaded, total );
    };
    var texture = new THREE.Texture();

    var onProgress = function ( xhr ) {
        if ( xhr.lengthComputable ) {
            var percentComplete = xhr.loaded / xhr.total * 100;
            console.log( Math.round(percentComplete, 2) + '% downloaded' );
        }
    };

    var onError = function ( xhr ) {
    };

    // var loader = new THREE.ImageLoader( manager );
    // loader.load( 'textures/marimekko.jpg', function ( image ) {
    //     texture.image = image;
    //     texture.needsUpdate = true;
    // } );

    // OBJ
    var mtlLoader = new THREE.MTLLoader();
    mtlLoader.setPath( 'models/' );
    mtlLoader.load( 'Air_Balloon.mtl', function( materials ) {

        materials.preload();

        var Objloader = new THREE.OBJLoader( manager );
        Objloader.setMaterials(materials);
        Objloader.setPath('models/');
        Objloader.load( 'Air_Balloon.obj', function ( object ) {

            object.position.y = 0;
            object.scale.set(10, 10, 10);

            object.rotation.x = 0;
            scene.add( object );

        }, onProgress, onError );
    });

    // OBJ
    mtlLoader_lego = new THREE.MTLLoader();
    mtlLoader_lego.setPath( 'models/' );
    mtlLoader_lego.load( 'lego_obj.mtl', function( materials ) {

        materials.preload();

        Objloader_lego = new THREE.OBJLoader( manager );
        Objloader_lego.setMaterials(materials);
        Objloader_lego.setPath('models/');
        Objloader_lego.load( 'lego_obj.obj', function ( object ) {

            object.position.y = 7;
            object.position.x = -10;
            object.scale.set(0.35, 0.35, 0.35);

            object.rotation.x = 0;
            scene.add( object );

        }, onProgress, onError );
    });

    //
    var gridHelper = new THREE.GridHelper( 200, 20 );
    gridHelper.position.y = -95;
    scene.add( gridHelper );

    //
    var ambientLight = new THREE.AmbientLight( 0xcccccc );
    scene.add( ambientLight );


    //
    renderer = new THREE.WebGLRenderer();
    renderer.setPixelRatio( window.devicePixelRatio );
    renderer.setSize( window.innerWidth, window.innerHeight );
    container.appendChild( renderer.domElement );
    renderer.setClearColor (0x5e90e0, 1);

    controls = new THREE.OrbitControls( camera, renderer.domElement );

    stats = new Stats();
    container.appendChild( stats.dom );

    window.addEventListener( 'resize', onWindowResize, false );

    // MOUSE CONTROLS
    document.addEventListener( 'mousemove', onDocumentMouseMove, false );

}


var changeLights = function() {
    var lightsVal = document.getElementById("lights").value;
    var directionalLight = new THREE.DirectionalLight( 0xf7e7dc );
    //point lights
    if(lightsVal === "point") {
        directionalLight = new THREE.PointLight( 0xf4eb42 );
        directionalLight.position.set( 0, 1, -1 ).normalize();
        scene.add( directionalLight );

    }
    // multiple light
    else if(lightsVal === "multiple") {
        directionalLight = new THREE.DirectionalLight( 0xf48f42 );
        directionalLight.position.set( 0, 1, -1 ).normalize();
        scene.add( directionalLight );
    }
    // directional light
    else{
        directionalLight = new THREE.DirectionalLight( 0xf7e7dc );
        directionalLight.position.set( 0, 1, -1 ).normalize();
        scene.add( directionalLight );
    }
    console.log(lightsVal);
}

// MOUSE CONTROLS
function onDocumentMouseMove(event) {
    mouseX = ( event.clientX - windowHalfX ) * 5;
    mouseY = ( event.clientY - windowHalfY ) * 5;
}


function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize( window.innerWidth, window.innerHeight );
}
function animate(time) {
    requestAnimationFrame( animate );
    render();
    stats.update();
    TWEEN.update(time);
}
function render() {
    // MOUSE CONTROLS
    camera.position.x += ( mouseX - camera.position.x ) * .01;
    camera.position.y += ( - mouseY - camera.position.y ) * .01;
    camera.lookAt( scene.position );

    renderer.render( scene, camera );
}

// Animation
// function animateTween(time) {
//     requestAnimationFrame(animateTween);
//     TWEEN.update(time);
// }
// requestAnimationFrame(animateTween);


function animation(X, Y, Z) {
    new TWEEN.Tween(camera.position)
        .to({ x: X, y: Y, z:Z }, 1000)
        .easing(TWEEN.Easing.Quadratic.Out)
        .onUpdate(function() {
            camera.lookAt( scene.position );
        })
        .start(); // Start the tween immediately.
        //console.log("Hi");
}
