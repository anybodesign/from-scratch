<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for the Typographie.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Excosup
 * @since 1.0
 * @version 1.0
 */
?>

					<h2>Typography (this is a subtitle)</h2>
					
					<p>Curabitur blandit tempus porttitor. <a href="#">Lorem ipsum dolor</a> sit amet, consectetur adipiscing elit. Aenean eu leo quam. <strong>Pellentesque ornare</strong> sem lacinia quam venenatis vestibulum.</p>
					
					<h3>This is a section subtitle</h3>
					
					<p>Etiam porta sem malesuada magna mollis euismod. <em>Nullam id dolor id nibh ultricies vehicula ut id elit.</em> Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Vestibulum id ligula porta felis euismod semper.</p>
					
					<ul>
						<li>I'm a list</li>
						<li>Unordered list...</li>
						<li>That's funny</li>
					</ul>
					
					<h4>And here is the section subtitle</h4>
					
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
					
					<h4>And is subtitle mate</h4>
					
					<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
					
					<ol>
						<li>The ordered list</li>
						<li>Because we love order</li>
						<li>Or not…</li>
					</ol>
					
					<blockquote>
						“ Typography is the craft of endowing human language with a durable visual form.  (I'm a quote) “<br>
						― Robert Bringhurst
					</blockquote>
					
					<h3>Forms</h3>
					
					<p>Sed posuere consectetur est at lobortis.</p>
					
					<div class="row nested">

						<form class="col-4">
							<fieldset>
								<legend>Fieldset Legend</legend>
								
								<div class="formfield-text">
									<label for="inp_text">The Label</label>
									<input type="text" id="inp_text" placeholder="A placeholder…">
								</div>
								
								<div class="formfield-checkbox">
									<input type="checkbox" id="inp_check">
									<label for="inp_check">The Label</label>
								</div>
								
								<div class="formfield-radio">
									<input type="radio" id="inp_rad">
									<label for="inp_rad">The Label</label>
								</div>
								
								<div class="formfield-select">
									<label for="inp_sel" class="screen-reader-text">The Label</label>
									<div class="formfield-select--container">
										<select id="inp_sel">
											<option>Option 1</option>
											<option>Option 2 with a very very long option text to show ellipsis</option>
											<option>Option 3</option>
											<option>Option 4</option>
										</select>
										
									</div>
								</div>
								
								<input type="submit" class="action-btn" value="Send">
								
							</fieldset>
							
							
							
						</form>
						
					</div>
					
					
					
					<h3>Images, Players & Tables</h3>
					
					<div class="row nested">
						
						<div class="col-4">
							<figure>
								<a href="#"><img src="http://placecorgi.com/500/340"></a>
								<figcaption>
									Place a Corgi
								</figcaption>
							</figure>
							
						</div>
						
						<div class="col-4 left-2">
							<figure>
								<a href="https://www.youtube.com/watch?v=PtMx316Vpvw">
									<img src="https://i1.ytimg.com/vi/PtMx316Vpvw/mqdefault.jpg">
								</a>
								<figcaption>
									Ride - Pulsar (vidéo)
								</figcaption>
							</figure>
							
						</div>
						
						<div class="col-6">
							
							<div class="table-container">
								<table width="100%">
									<thead>
										<tr>
											<th>Animal</th>
											<th>Name</th>
											<th>Age</th>
											<th>Weight</th>
											<th>Hobby</th>
											<th>Passion</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Cat</td>
											<td>Prosper</td>
											<td>13</td>
											<td>8 kg</td>
											<td>Sleeping</td>
											<td>Food</td>
										</tr>
										<tr>
											<td>Cat</td>
											<td>Garfield</td>
											<td>4</td>
											<td>5 kg</td>
											<td>Hunting</td>
											<td>Food</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="6">That's all about cats now...</td>
										</tr>
									</tfoot>
								</table>
							</div>
							
						</div>
					</div>
