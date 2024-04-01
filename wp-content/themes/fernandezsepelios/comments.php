<div id="comments" class="commentsContainer">
	<div class="comments">
		<span class="tituloComments">
			Mensajes
		</span>
		<?php if ( post_password_required() ) : ?>
		<p><?php esc_html_e( 'Post is password protected. Enter the password to view any comments.', 'html5blank' ); ?></p>
	</div>

		<?php return; endif; ?>

	<?php if ( have_comments() ) : ?>

		<ul class="mensajes">
			<li class="mensajeContainer">
				<?php wp_list_comments( 'type=comment&callback=html5blankcomments' ); // Custom callback in functions.php. ?>
			</li>
		</ul>

	<?php elseif ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p><?php esc_html_e( 'Comments are closed here.', 'html5blank' ); ?></p>

	<?php endif; ?>
		<div class="dejarMensajeContainer">
			<span class="tituloComments">
				Dejá tu mensaje
			</span>
			<?php 
				$comments_args = array(
					'title_reply'=>'',
					'title_reply_to'=>__( 'Dejá un mensaje' ),
					'label_submit' =>__( 'Enviar Mensaje' ),
					'class_submit' => 'boton submit-button',
					'comment_field' => '<div class="comment-form-comment"><p><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" maxlength="500" required="required"></textarea></p></div>',
					'logged_in_as' => '',
				);

				comment_form($comments_args); 
			?>
		</div>
	</div>
</div>