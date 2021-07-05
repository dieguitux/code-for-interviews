<?php

private function matchWithIdentityType(Transaction $transaction): bool
{
    	return $transaction->getCustomer()->getIdentity()->getType()->isAny([
        	IdentityType ::DNI,
        	IdentityType::PASSPORT,
    	]);
}
