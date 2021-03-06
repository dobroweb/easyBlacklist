<?php

class eblBlacklistRemoveProcessor extends modProcessor {
    public $objectType = 'ebl_items_err';
    public $classKey = 'eblBlacklist';
    public $permission = 'remove_document';

    /** {inheritDoc} */
    public function process() {

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('ebl_items_err_ns'));
        }
        foreach ($ids as $id) {
            /** @var eblBlacklist $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('ebl_items_err_nf'));
            }
            $object->remove();
        }

        return $this->success();
    }

}

return 'eblBlacklistRemoveProcessor';