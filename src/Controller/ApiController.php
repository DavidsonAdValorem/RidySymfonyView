<?php

namespace App\Controller;

use App\Entity\Skills;
use App\Repository\SkillsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiController extends AbstractController
{
    #[Route('/api/getSkills', name: 'app_skills', methods: 'GET')]
    public function getSkills(SkillsRepository $skRepo, SerializerInterface $serializer): JsonResponse
    {
        //get all skills
        $skills = $skRepo->findAll();
        //serialize skills
        $jsonSkills = $serializer->serialize($skills, 'json');
        return new JsonResponse($jsonSkills, 200, [], true);
    }

    #[Route('/api/CreateSkill', name: 'app_create_skills', methods: 'POST')]
    public function CreateSkill(Request $request, ValidatorInterface $validator, EntityManagerInterface $em)
    {
        //get all data in request
        $data = $request->request->all();
        //create skills with data
        $skill = new Skills();
        $skill->setName($data["name"]);
        $skill->setSide($data["side"]);
        $skill->setUrlImg($data["img"]);
        $skill->setType($data["type"]);
        $skill->setLevel($data["level"]);
        $skill->setDescription($data["desc"]);
        //verify errors
        $errors = $validator->validate($skill);

        if (count($errors) > 0) {
            //return error 
            $errorsString = (string) $errors;
            return new JsonResponse($errorsString, 403, []);
        }
        //save skill
        $em->persist($skill);
        $em->flush();
        //redirect to home
        return $this->redirectToRoute('app_home');
    }
}
