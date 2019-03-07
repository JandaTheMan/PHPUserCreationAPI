<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-03-04
 * Time: 17:48
 */

namespace Controllers;


use Application\UserApplicationService;
use Application\UserMapper;
use Slim\Http\Request;
use Slim\Http\Response;

class UserController
{
    private $userApplicationService;

    public function __construct(UserApplicationService $userApplicationService)
    {
        $this->userApplicationService = $userApplicationService;
    }

    public function createUser(Request $request, Response $response, $args)
    {
        $requestUser = $request->getParams();
        $requestUserDTO=UserMapper::fromArrayToUserDTOWithoutID($requestUser);
        $createdUserDTO=$this->userApplicationService->createAndSaveUser($requestUserDTO);
        $createdUser = UserMapper::fromUserDTOtoJSON($createdUserDTO);
        return $response->withJson($createdUser);
    }

    public function retrieveUser(Request $req,Response $res, $args):string
    {
        $requestedUserId = $args['id'];
        $requestedUserIdDTo = UserMapper::fromIDtoDTO($requestedUserId);
        $returnUser = $this->userApplicationService->getUserById($requestedUserIdDTo);
        $returnUser = UserMapper::fromUserDTOtoJSON($returnUser);
        return $returnUser;
    }

}