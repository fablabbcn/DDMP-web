<?php

$is_link = isset( $button['href'] );

?>


<?php if ( $is_link ) : ?>
  <a
    class="ddp-button <?php echo $button['theme'] ?: ''; ?>"
    href="<?php echo esc_attr( $button['href'] ); ?>"
    target="<?php echo esc_attr( $button['target'] ?? '_self' ); ?>"
    <?php echo esc_attr( $button['attrs'] ?? '' ); ?>
  >
    <?php echo esc_html( $button['label'] ); ?>
  </a>

<?php elseif ( $button['type'] === 'span' ) : ?>
  <span
    class="ddp-button <?php echo $button['theme'] ?: ''; ?>"
  >
    <?php echo esc_html( $button['label'] ); ?>
  </span>

<?php else : ?>
  <button
    class="ddp-button <?php echo $button['theme'] ?: ''; ?>"
    type="<?php echo esc_attr( $button['type'] ?? 'button' ); ?>"
  >
    <?php echo esc_html( $button['label'] ); ?>
  </button>

<?php endif; ?>
