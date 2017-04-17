<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SignosVitalesSuministrados;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Signosvitalessuministrado controller.
 *
 * @Route("signosvitalessuministrados")
 */
class SignosVitalesSuministradosController extends Controller
{
    /**
     * Lists all signosVitalesSuministrado entities.
     *
     * @Route("/", name="signosvitalessuministrados_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $signosVitalesSuministrados = $em->getRepository('AppBundle:SignosVitalesSuministrados')->findAll();

        return $this->render('signosvitalessuministrados/index.html.twig', array(
            'signosVitalesSuministrados' => $signosVitalesSuministrados,
        ));
    }

    /**
     * Creates a new signosVitalesSuministrado entity.
     *
     * @Route("/new", name="signosvitalessuministrados_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $signosVitalesSuministrado = new SignosVitalesSuministrados();
        $form = $this->createForm('AppBundle\Form\SignosVitalesSuministradosType', $signosVitalesSuministrado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($signosVitalesSuministrado);
            $em->flush($signosVitalesSuministrado);

            return $this->redirectToRoute('signosvitalessuministrados_show', array('id' => $signosVitalesSuministrado->getId()));
        }

        return $this->render('signosvitalessuministrados/new.html.twig', array(
            'signosVitalesSuministrado' => $signosVitalesSuministrado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a signosVitalesSuministrado entity.
     *
     * @Route("/{id}", name="signosvitalessuministrados_show")
     * @Method("GET")
     */
    public function showAction(SignosVitalesSuministrados $signosVitalesSuministrado)
    {
        $deleteForm = $this->createDeleteForm($signosVitalesSuministrado);

        return $this->render('signosvitalessuministrados/show.html.twig', array(
            'signosVitalesSuministrado' => $signosVitalesSuministrado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing signosVitalesSuministrado entity.
     *
     * @Route("/{id}/edit", name="signosvitalessuministrados_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SignosVitalesSuministrados $signosVitalesSuministrado)
    {
        $deleteForm = $this->createDeleteForm($signosVitalesSuministrado);
        $editForm = $this->createForm('AppBundle\Form\SignosVitalesSuministradosType', $signosVitalesSuministrado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('signosvitalessuministrados_edit', array('id' => $signosVitalesSuministrado->getId()));
        }

        return $this->render('signosvitalessuministrados/edit.html.twig', array(
            'signosVitalesSuministrado' => $signosVitalesSuministrado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a signosVitalesSuministrado entity.
     *
     * @Route("/{id}", name="signosvitalessuministrados_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SignosVitalesSuministrados $signosVitalesSuministrado)
    {
        $form = $this->createDeleteForm($signosVitalesSuministrado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($signosVitalesSuministrado);
            $em->flush($signosVitalesSuministrado);
        }

        return $this->redirectToRoute('signosvitalessuministrados_index');
    }

    /**
     * Creates a form to delete a signosVitalesSuministrado entity.
     *
     * @param SignosVitalesSuministrados $signosVitalesSuministrado The signosVitalesSuministrado entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SignosVitalesSuministrados $signosVitalesSuministrado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('signosvitalessuministrados_delete', array('id' => $signosVitalesSuministrado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
