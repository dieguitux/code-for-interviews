<?php

public function getAvalaibleStore($id): Store
{
    	$store = $this->storeRepository->find($id);
   	 
    	if ($store) {
        	return $store;
    	}
   	 
    	return false;
}

