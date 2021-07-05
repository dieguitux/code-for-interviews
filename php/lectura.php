<?php

$data = $input['data'];
$roles = $input['roles'];

$user = $this->createUserStub($data);

DB::transaction(function () use ($user, $data, $roles) {
    if ($user->save()) {
      if (! count($roles['assignees_roles'])) {             
          throw new GeneralException(trans('exceptions.backend.access.users.role_needed_create'));
      }

      $user->attachRoles($roles['assignees_roles']);

      if (isset($data['confirmation_email']) && $user->confirmed == 0) {
          $user->notify(new UserNeedsConfirmation($user->confirmation_code));
      }

      event(new UserCreated($user));

      return $user;
    }
            
    throw new GeneralException(trans('exceptions.backend.access.users.create_error'));
});
