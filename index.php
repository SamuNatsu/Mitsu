<?php
/**
 * A simple but powerful theme
 * 
 * @package Mitsu
 * @author Rainiar
 * @version 1.0.0
 * @link https://rainiar.top
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$this->need('header.php');
?>

<div class="flex-col flex-x-center article-list">
<?php while ($this->next()): ?>
	<article class="article-item" itemscope itemtype="http://schema.org/BlogPosting">
		<h2 class="article-title" itemprop="name headline">
            <a class="hover-u-lr" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </h2>
		<div class="article-body" itemprop="articleBody"><?php $this->excerpt(); ?></div>
		<div class="flex-row article-meta">
			<div><time datetime="<?php $this->date('Y/m/d H:i:s'); ?>" itemprop="datePublished"><?php $this->date('Y/m/d H:i:s'); ?></time></div>
			<div class="article-meta-tag"><?php $this->category(' | '); ?></div>
		</div>
	</article>
<?php endwhile; ?>
</div>

<?php $this->pageNav(
	_t('&laquo;上一页'), 
	_t('下一页&raquo;'),
	1,
	'...',
	'wrapTag=div&wrapClass=flex-row flex-m-center page-nav&itemTag=div&currentClass=page-nav-current&prevClass=page-nav-prev&nextClass=page-nav-next'
); ?>

<?php $this->need('footer.php'); ?>
