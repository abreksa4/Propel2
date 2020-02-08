
/**
 * Persists the object to the database without archiving it.
 *
 * @param ConnectionInterface $con Optional connection object
 *
 * @return $this|<?php echo $objectClassName ?> The current object (for fluent API support)
 */
public function saveWithoutArchive(ConnectionInterface $con = null)
{
<?php if (!$isArchiveOnInsert): ?>
    if (!$this->_isNew()) {
        $this->archiveOnUpdate = false;
    }
<?php elseif (!$isArchiveOnUpdate): ?>
    if ($this->_isNew()) {
        $this->archiveOnInsert = false;
    }
<?php else: ?>
    if ($this->_isNew()) {
        $this->archiveOnInsert = false;
    } else {
        $this->archiveOnUpdate = false;
    }
<?php endif; ?>

    return $this->save($con);
}
