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

    #[Route('/api/getSkill/{id}', name: 'app_skill', methods: 'GET')]
    public function getSkill(SkillsRepository $skRepo, SerializerInterface $serializer, int $id): JsonResponse
    {
        //get all skills
        $skill = $skRepo->find($id);
        //serialize skills
        $jsonSkills = $serializer->serialize($skill, 'json');
        return new JsonResponse($jsonSkills, 200, [], true);
    }

    #[Route('/api/update/skill/{id}', name: 'app_update_skill', methods: 'PUT')]
    public function updateSkill(int  $id, SkillsRepository $skRepo, Request $request, EntityManagerInterface $em, ValidatorInterface $validator)
    {
        //get skill with id
        $skill = $skRepo->find($id);
        //verify skill exist
        if (!$skill) {
            $json = [
                'success' => false,
                'message' => 'Any skill not found, please create new skill'
            ];
            return new JsonResponse($json, 403, []);
        }
        //get all data in request
        $data = json_decode($request->getContent(), true);
        $skill->setName($data["name"]);
        $skill->setSide($data["side"]);
        $skill->setUrlImg($data["urlImg"]);
        $skill->setType($data["type"]);
        $skill->setLevel($data["level"]);
        $skill->setDescription($data["description"]);
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


        $json = [
            'success' => true,
            'message' => 'Skill updated successfully'
        ];

        return new JsonResponse($json, 200, []);
    }

    #[Route('/api/skill/delete/{id}', name: 'app_delete_skill', methods: 'DELETE')]
    public function deleteSkill(SkillsRepository $skRepo, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $id = $request->get('id');
        //get skill with id
        $skill = $skRepo->find($id);
        //delete skill
        $em->remove($skill);
        $em->flush();
        $json = [
            'success' => true,
            'message' => 'Skill deleted successfully'
        ];
        return new JsonResponse($json, 200, []);
    }

    #[Route('/api/create/skill', name: 'app_create_skill', methods: 'POST')]
    public function CreateSkill(Request $request, ValidatorInterface $validator, EntityManagerInterface $em)
    {
        //get all data in request
        $data = json_decode($request->getContent(), true);
        //create skills with data
        $skill = new Skills();
        $skill->setName($data["name"]);
        $skill->setSide($data["side"]);
        $skill->setUrlImg($data["urlImg"]);
        $skill->setType($data["type"]);
        $skill->setLevel($data["level"]);
        $skill->setDescription($data["description"]);
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

        $json = [
            'success' => true,
            'message' => 'Skill created successfully'
        ];
        return new JsonResponse($json, 201, []);
    }
}
