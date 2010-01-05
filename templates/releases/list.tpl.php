<?php if ($project->releasePolicy() === 'auto'): ?>
<p>
  This project is on automatic release policy. To roll a new release just make a tag in the repository. Having trouble? Check the <?php echo html_link(url('/faq'), 'FAQ'); ?>.
</p>
<?php else: ?>
<p>
  This project is on manual release policy. <?php echo html_link(url('', array('create')), "You can create a new release right now"); ?>.
</p>
<?php endif; ?>

<?php if (count($releases) === 0): ?>
<p>
  There are no releases yet.
</p>
<?php endif; ?>

<ul id="releases">
<?php foreach ($releases as $release): ?>
<?php $package_name = $project->name() . '-' . $release->version() . '.tgz'; ?>
  <li>
    <h3><?php e($release->version()) ?></h3>
    <p>
      created: <?php e($release->created()) ?>
      <br/>
      mode: <?php e($release->mode()) ?>
      <br/>
      status: <?php e($release->status()) ?>
    </p>
<?php if ($release->status() == 'completed'): ?>
    <p>
      Download: <a href="<?php e(url('/get/' . $package_name)) ?>"><?php e($package_name) ?></a> (For manual installation only)
    </p>
<?php endif; ?>
  </li>
<?php endforeach; ?>
</ul>