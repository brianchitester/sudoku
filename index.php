<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Sudoku Solver</title>
  <meta name="description" content="Sudoku Solver">
  <meta name="author" content="Brian Chitester">

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons 
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  <link rel="apple-touch-icon" sizes="114x114" href="/touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/touch-icon-72x72.png" />
	<link rel="apple-touch-icon" href="/touch-icon-iphone.png" />
	-->

  
  <!--<link rel="stylesheet" href="css/bootstrap.min.css">
  
  <!--include addtional styles AFTER bootstrap -->
  <link rel="stylesheet" href="css/style.css">
  
  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except this Modernizr build incl. Respond.js
       Respond is a polyfill for min/max-width media queries. Modernizr enables HTML5 elements & feature detects; 
       for optimal performance, create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

	<div class="container">
		<header>
			<h1>Sudoku Solver</h1>
			<h4>all done up by Brian Chitester</h4>
		</header>
		
		<form action="solution.php" method="post">
			<table cellspacing="0" cellpadding="0" class="t">
				<tbody>
					<tr>
						<td class="g0" id="c00">
							<input class="s0" size="2" autocomplete="off" name="000" maxlength="1">
						</td>
						<td class="f0" id="c10">
							<input class="s0" size="2" autocomplete="off" name="100" maxlength="1">
						</td>
						<td class="f0" id="c20">
							<input class="s0" size="2" autocomplete="off" name="200" maxlength="1">
						</td>
						<td class="g0" id="c30">
							<input class="s0" size="2" autocomplete="off" name="301" maxlength="1">
						</td>
						<td class="f0" id="c40">
							<input class="s0" size="2" autocomplete="off" name="401" maxlength="1">
						</td>
						<td class="f0" id="c50">
							<input class="s0" size="2" autocomplete="off" name="501" maxlength="1">
						</td>
						<td class="g0" id="c60">
							<input class="s0" size="2" autocomplete="off" name="602" maxlength="1">
						</td>
						<td class="f0" id="c70">
							<input class="s0" size="2" autocomplete="off" name="702" maxlength="1">
						</td>
						<td class="f0" id="c80">
							<input class="s0" size="2" autocomplete="off" name="802" maxlength="1">
						</td>
					</tr>
					<tr>
						<td class="e0" id="c01">
							<input class="s0" size="2" autocomplete="off" name="010" maxlength="1">
						</td>
						<td class="c0" id="c11">
							<input class="s0" size="2" autocomplete="off" name="110" maxlength="1">
						</td>
						<td class="c0" id="c21">
							<input class="s0" size="2" autocomplete="off" name="210" maxlength="1">
						</td>
						<td class="e0" id="c31">
							<input class="s0" size="2" autocomplete="off" name="311" maxlength="1">
						</td>
						<td class="c0" id="c41">
							<input class="s0" size="2" autocomplete="off" name="411" maxlength="1">
						</td>
						<td class="c0" id="c51">
							<input class="s0" size="2" autocomplete="off" name="511" maxlength="1">
						</td>
						<td class="e0" id="c61">
							<input class="s0" size="2" autocomplete="off" name="612" maxlength="1">
						</td>
						<td class="c0" id="c71">
							<input class="s0" size="2" autocomplete="off" name="712" maxlength="1">
						</td>
						<td class="c0" id="c81">
							<input class="s0" size="2" autocomplete="off" name="812" maxlength="1">
						</td>
					</tr>
					<tr>
						<td class="e0" id="c02">
							<input class="s0" size="2" autocomplete="off" name="020" maxlength="1">
						</td>
						<td class="c0" id="c12">
							<input class="s0" size="2" autocomplete="off" name="120" maxlength="1">
						</td>
						<td class="c0" id="c22">
							<input class="s0" size="2" autocomplete="off" name="220" maxlength="1">
						</td>
						<td class="e0" id="c32">
							<input class="s0" size="2" autocomplete="off" name="321" maxlength="1">
						</td>
						<td class="c0" id="c42">
							<input class="s0" size="2" autocomplete="off" name="421" maxlength="1">
						</td>
						<td class="c0" id="c52">
							<input class="s0" size="2" autocomplete="off" name="521" maxlength="1">
						</td>
						<td class="e0" id="c62">
							<input class="s0" size="2" autocomplete="off" name="622" maxlength="1">
						</td>
						<td class="c0" id="c72">
							<input class="s0" size="2" autocomplete="off" name="722" maxlength="1">
						</td>
						<td class="c0" id="c82">
							<input class="s0" size="2" autocomplete="off" name="822" maxlength="1">
						</td>
					</tr>
					<tr>
						<td class="g0" id="c03">
							<input class="s0" size="2" autocomplete="off" name="033" maxlength="1">
						</td>
						<td class="f0" id="c13">
							<input class="s0" size="2" autocomplete="off" name="133" maxlength="1">
						</td>
						<td class="f0" id="c23">
							<input class="s0" size="2" autocomplete="off" name="233" maxlength="1">
						</td>
						<td class="g0" id="c33">
							<input class="s0" size="2" autocomplete="off" name="334" maxlength="1">
						</td>
						<td class="f0" id="c43">
							<input class="s0" size="2" autocomplete="off" name="434" maxlength="1">
						</td>
						<td class="f0" id="c53">
							<input class="s0" size="2" autocomplete="off" name="534" maxlength="1">
						</td>
						<td class="g0" id="c63">
							<input class="s0" size="2" autocomplete="off" name="635" maxlength="1">
						</td>
						<td class="f0" id="c73">
							<input class="s0" size="2" autocomplete="off" name="735" maxlength="1">
						</td>
						<td class="f0" id="c83">
							<input class="s0" size="2" autocomplete="off" name="835" maxlength="1">
						</td>
						</tr>
						<tr>
						<td class="e0" id="c04">
							<input class="s0" size="2" autocomplete="off" name="043" maxlength="1">
						</td>
						<td class="c0" id="c14">
							<input class="s0" size="2" autocomplete="off" name="143" maxlength="1">
						</td>
						<td class="c0" id="c24">
							<input class="s0" size="2" autocomplete="off" name="243" maxlength="1">
						</td>
						<td class="e0" id="c34">
							<input class="s0" size="2" autocomplete="off" name="344" maxlength="1">
						</td>
						<td class="c0" id="c44">
							<input class="s0" size="2" autocomplete="off" name="444" maxlength="1">
						</td>
						<td class="c0" id="c54">
							<input class="s0" size="2" autocomplete="off" name="544" maxlength="1">
						</td>
						<td class="e0" id="c64">
							<input class="s0" size="2" autocomplete="off" name="645" maxlength="1">
						</td>
						<td class="c0" id="c74">
							<input class="s0" size="2" autocomplete="off" name="745" maxlength="1">
						</td>
						<td class="c0" id="c84">
							<input class="s0" size="2" autocomplete="off" name="845" maxlength="1">
						</td>
					</tr>
					<tr>
						<td class="e0" id="c05">
							<input class="s0" size="2" autocomplete="off" name="053" maxlength="1">
						</td>
						<td class="c0" id="c15">
							<input class="s0" size="2" autocomplete="off" name="153" maxlength="1">
						</td>
						<td class="c0" id="c25">
							<input class="s0" size="2" autocomplete="off" name="253" maxlength="1">
						</td>
						<td class="e0" id="c35">
							<input class="s0" size="2" autocomplete="off" name="354" maxlength="1">
						</td>
						<td class="c0" id="c45">
							<input class="s0" size="2" autocomplete="off" name="454" maxlength="1">
						</td>
						<td class="c0" id="c55">
							<input class="s0" size="2" autocomplete="off" name="554" maxlength="1">
						</td>
						<td class="e0" id="c65">
							<input class="s0" size="2" autocomplete="off" name="655" maxlength="1">
						</td>
						<td class="c0" id="c75">
							<input class="s0" size="2" autocomplete="off" name="755" maxlength="1">
						</td>
						<td class="c0" id="c85">
							<input class="s0" size="2" autocomplete="off" name="855" maxlength="1">
						</td>
					</tr>
					<tr>
						<td class="g0" id="c06">
							<input class="s0" size="2" autocomplete="off" name="066" maxlength="1">
						</td>
						<td class="f0" id="c16">
							<input class="s0" size="2" autocomplete="off" name="166" maxlength="1">
						</td>
						<td class="f0" id="c26">
							<input class="s0" size="2" autocomplete="off" name="266" maxlength="1">
						</td>
						<td class="g0" id="c36">
							<input class="s0" size="2" autocomplete="off" name="367" maxlength="1">
						</td>
						<td class="f0" id="c46">
							<input class="s0" size="2" autocomplete="off" name="467" maxlength="1">
						</td>
						<td class="f0" id="c56">
							<input class="s0" size="2" autocomplete="off" name="567" maxlength="1">
						</td>
						<td class="g0" id="c66">
							<input class="s0" size="2" autocomplete="off" name="668" maxlength="1">
						</td>
						<td class="f0" id="c76">
							<input class="s0" size="2" autocomplete="off" name="768" maxlength="1">
						</td>
						<td class="f0" id="c86">
							<input class="s0" size="2" autocomplete="off" name="868" maxlength="1">
						</td>
					</tr>
					<tr>
						<td class="e0" id="c07">
							<input class="s0" size="2" autocomplete="off" name="076" maxlength="1">
						</td>
						<td class="c0" id="c17">
							<input class="s0" size="2" autocomplete="off" name="176" maxlength="1">
						</td>
						<td class="c0" id="c27">
							<input class="s0" size="2" autocomplete="off" name="276" maxlength="1">
						</td>
						<td class="e0" id="c37">
							<input class="s0" size="2" autocomplete="off" name="377" maxlength="1">
						</td>
						<td class="c0" id="c47">
							<input class="s0" size="2" autocomplete="off" name="477" maxlength="1">
						</td>
						<td class="c0" id="c57">
							<input class="s0" size="2" autocomplete="off" name="577" maxlength="1">
						</td>
						<td class="e0" id="c67">
							<input class="s0" size="2" autocomplete="off" name="678" maxlength="1">
						</td>
						<td class="c0" id="c77">
							<input class="s0" size="2" autocomplete="off" name="778" maxlength="1">
						</td>
						<td class="c0" id="c87">
							<input class="s0" size="2" autocomplete="off" name="878" maxlength="1">
						</td>
					</tr>
					<tr>
						<td class="i0" id="c08">
							<input class="s0" size="2" autocomplete="off" name="086" maxlength="1">
						</td>
						<td class="h0" id="c18">
							<input class="s0" size="2" autocomplete="off" name="186" maxlength="1">
						</td>
						<td class="h0" id="c28">
							<input class="s0" size="2" autocomplete="off" name="286" maxlength="1">
						</td>
						<td class="i0" id="c38">
							<input class="s0" size="2" autocomplete="off" name="387" maxlength="1">
						</td>
						<td class="h0" id="c48">
							<input class="s0" size="2" autocomplete="off" name="487" maxlength="1">
						</td>
						<td class="h0" id="c58">
							<input class="s0" size="2" autocomplete="off" name="587" maxlength="1">
						</td>
						<td class="i0" id="c68">
							<input class="s0" size="2" autocomplete="off" name="688" maxlength="1">
						</td>
						<td class="h0" id="c78">
							<input class="s0" size="2" autocomplete="off" name="788" maxlength="1">
						</td>
						<td class="h0" id="c88">
							<input class="s0" size="2" autocomplete="off" name="888" maxlength="1">
						</td>
					</tr>
				</tbody>
			</table>
			<input id="submit" type="Submit"/>
		</form>
		
		<footer>
		</footer>
	</div>
  


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via build script -->
  <script defer src="js/libs/bootstrap.min.js"></script>
  <script defer src="js/script.js"></script>
  <!-- end scripts -->


  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>
