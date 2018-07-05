<?php
/**
 * @package Hello_Rodney
 * @version 1.0
 */
/*
Plugin Name: Hello Rodney
Plugin URI: http://fredjs.com/wordpress/hello-rodney
Description: This is not just a plugin, it's a stupid plugin you DO NOT NEED! But if you use it, you'll be treated to one-liners from the king of one-liners, the late Rodney Dangerfield.
Author: Freddy J.
Version: 1.0
Author URI: http://fredjs.com/
*/

function hello_rodney_get_joke() {
	/** These are some of Rodney's one liners */
	$jokes = 
" I tell ya when I was a kid, all I knew was rejection. My yo-yo, it never came back!
When I was a kid in show business I was poor. I used to go to orgies to eat the grapes.
Last week I told my psychiatrist that I keep thinking about suicide. He told me from now on I have to pay in advance.
I come from a stupid family. During the Civil War my great uncle fought for the west!
My father was stupid. He worked in a bank and they caught him stealing pens.
My mother never breast fed me. She told me that she only liked me as a friend.
My wife made me join a bridge club. I jump off next Tuesday.
I could tell that my parents hated me. My bath toys were a toaster and a radio.
I told my dentist my teeth are going yellow. He told me to wear a brown necktie.
I'm so ugly, a hooker once told me she had a headache.
Boy what lousy a hotel that was! They stole MY towel!
What a dog I got. When he found out we look alike, he killed himself!
It's tough to stay married. My wife kisses the dog on the lips, yet she won't drink from my glass.
I was so ugly, my mother used to feed me with a slingshot!
When my old man wanted sex, my mother would show him a picture of me.
Last week my tie caught on fire. Some guy tried to put it out with an ax!";

	// Here we split it into lines
	$jokes = explode( "\n", $jokes );

	// And then randomly choose a line
	return wptexturize( $jokes[ mt_rand( 0, count( $jokes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_rodney() {
	$chosen = hello_rodney_get_joke();
	echo "<p id='rodney'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_rodney' );

// We need some CSS to position the paragraph
function rodney_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#rodney {
		float: $x;
		padding: 4.5px 8px;
		margin: 0;
		font-size: 13px;
		font-weight: bold;
		color: #c00;
		background: #fff;
		border: 1px solid #ddd;
		border-top: 0;
	}
	</style>
	";
}

add_action( 'admin_head', 'rodney_css' );

?>