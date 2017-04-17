<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ObservacionSuministrada;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Observacionsuministrada controller.
 *
 * @Route("observacionsuministrada")
 */
class ObservacionSuministradaController extends Controller
{
    /**
     * Lists all observacionSuministrada entities.
     *
     * @Route("/", name="observacionsuministrada_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $observacionSuministradas = $em->getRepository('AppBundle:ObservacionSuministrada')->findAll();

        return $this->render('observacionsuministrada/index.html.twig', array(
            'observacionSuministradas' => $observacionSuministradas,
        ));
    }

    /**
     * Creates a new observacionSuministrada entity.
     *
     * @Route("/new", name="observacionsuministrada_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $observacionSuministrada = new ObservacionSuministrada();
        $form = $this->createForm('AppBundle\Form\ObservacionSuministradaType', $observacionSuministrada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($observacionSuministrada);
            $em->flush($observacionSuministrada);

            return $this->redirectToRoute('observacionsuministrada_show', array('id' => $observacionSuministrada->getId()));
        }

        return $this->render('observacionsuministrada/new.html.twig', array(
            'observacionSuministrada' => $observacionSuministrada,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a observacionSuministrada entity.
     *
     * @Route("/{id}", name="observacionsuministrada_show")
     * @Method("GET")
     */
    public function showAction(ObservacionSuministrada $observacionSuministrada)
    {
        $deleteForm = $this->createDeleteForm($observacionSuministrada);

        return $this->render('observacionsuministrada/show.html.twig', array(
            'observacionSuministrada' => $observacionSuministrada,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing observacionSuministrada entity.
     *
     * @Route("/{id}/edit", name="observacionsuministrada_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ObservacionSuministrada $observacionSuministrada)
    {
        $deleteForm = $this->createDeleteForm($observacionSuministrada);
        $editForm = $this->createForm('AppBundle\Form\ObservacionSuministradaType', $observacionSuministrada);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('observacionsuministrada_edit', array('id' => $observacionSuministrada->getId()));
        }

        return $this->render('observacionsuministrada/edit.html.twig', array(
            'observacionSuministrada' => $observacionSuministrada,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a observacionSuministrada entity.
     *
     * @Route("/{id}", name="observacionsuministrada_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ObservacionSuministrada $observacionSuministrada)
    {
        $form = $this->createDeleteForm($observacionSuministrada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($observacionSuministrada);
            $em->flush($observacionSuministrada);
        }

        return $this->redirectToRoute('observacionsuministrada_index');
    }

    /**
     * Creates a form to delete a observacionSuministrada entity.
     *
     * @param ObservacionSuministrada $observacionSuministrada The observacionSuministrada entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ObservacionSuministrada $observacionSuministrada)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('observacionsuministrada_delete', array('id' => $observacionSuministrada->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
